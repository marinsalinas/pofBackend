<?php

class OrdersAPIController extends \BaseController {

    function __construct() {
        //Con esto le digo que no le aplique el filtro a la funcion store.
        $this->beforeFilter('auth.token');
        // ...
    }



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $history = Input::get('history');

        if(!$history){
            return Response::json(array('error'=>false,'orders'=>Auth::user()->user()->orders()->where('status', '!=','Entregado')->get()),200);
        }
        return Response::json(array('error'=>false,'orders'=>Auth::user()->user()->orders->where('status', '=','Entregado')->get(),200));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        //Request Params Prototype
        /*{
       orders: {
               address_id: 3
               restaurant_id: 3
               items_id: [n] //Menu
                   0:  18
                   1:  19
                   2:  20
               items_q: [n] //Cantidad
                   0:  2
                   1:  3
                   2:  1
       }*/
        $validacion = Validator::make(Input::all(), array(
            'address_id' => 'required',
            'restaurant_id' => 'required',
            'items_id' => 'required',
            'items_q' => 'required',
        ));

        if ($validacion->fails()) {
            return Response::json(array('error'=>true, 'messages' => $validacion->messages()), 400);
        }
        $user = Auth::user()->user();
        $address = $user->address()->find(Input::get('address_id'));
        $restaurant = Restaurant::find(Input::get('restaurant_id'));
        $items_id = Input::get('items_id');
        $items_q = Input::get('items_q');
        if(!$address){
            return Response::json(array('error'=>true, 'message' => 'No se encontro la direccion proporcionada'), 400);
        }
        if(!$restaurant){
            return Response::json(array('error'=>true, 'message' => 'No se encontro el restaurante proporcionada'), 400);
        }
        if(count($items_id) != count($items_q)){
            return Response::json(array('error'=>true, 'message' => 'items_id  y items_q son de diferente dimension'), 400);
        }
        //Para guardar los dispositivos
        $items = array();
        for($i = 0; $i<count($items_id); $i++){
            $item_id = $items_id[$i];
            $item_q = $items_q[$i];
            $menu_item = $restaurant->menu()->find($item_id);
            if(!$menu_item){
                return Response::json(array('error'=>true, 'message' => 'Algun Item de la compra no pertenece al restaurant'), 400);
            }

            $item = new Item();
            $item->menu()->associate($menu_item);
            $item->quantity = $item_q;
            array_push($items, $item);
        }

        $device = Devices::find(6);

        $order = new Orders();
        $order->user()->associate($user);
        $order->address()->associate($address);
        $order->restaurant()->associate($restaurant);
        $order->status = 'En Proceso';
        $order->device()->associate($device);
        if($order->push()){
            //Si se guardo la orden se guardan sus items relacionados
            $order->items()->saveMany($items);
        }
        $order->items;
        return Response::json(array('error'=>false, 'order'=>$order),200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $orsers = Orders::find($id);

        if($orsers== null){
            return Response::json(array('error'=>true, 'message'=>'No se encontro restaurante'), 400);
        }

        return Response::json(array("error"=>false, 'order'=>$orsers), 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function prediction(){
        $validacion = Validator::make(Input::all(), [
            'latitude' => 'required',
            'longitude' => 'required',
            'food_hour' =>'required'
        ]);

        if ($validacion->fails()) {

            return Response::json(array('error'=>true, 'messages'=>$validacion->messages()),400);
        }
        if(Input::get('food_hour')< 0 || Input::get('food_hour')>2){
            return Response::json(array('error'=>true, 'message'=>'Horario de Comida incorrecto Desayuno 0, Comida 1, Cena 2'),400);
        }


        $lon = Input::get('longitude');
        $lat = Input::get('latitude');
        global $food_id;
        global $geocode;
        try {
            $geocode = Geocoder::reverse($lat, $lon);
            // The GoogleMapsProvider will return a result

        } catch (\Exception $e) {
            // No exception will be thrown here
            echo $e->getMessage();
        }

        $zip = $geocode->getZipcode();




        $fichero_entrenamiento = (dirname(__FILE__) . "/menuReference.net");
        if (!is_file($fichero_entrenamiento))
            die("No ha sido creado el documento");

        $rna = fann_create_from_file($fichero_entrenamiento);
        if (!$rna)
            die("No se pudo crear ANN");

        $divisor = 1;

        for($i = 0;$i<strlen($zip);$i++){
            $divisor *= 10;
        }

        $newZip = $zip/$divisor;

        //Construir el array de entrada


        $entrada = [0, 0, 1, 0, 1, 0, 0, $newZip];

        $output = fann_run($rna, $entrada);
        fann_destroy($rna);
        $food_id = intval(round($output[0],2)*100);





        $db = DB::table('restaurants')
            ->join('menus', function($join)
            {
                global $food_id;
                $join->on('restaurants.id', '=', 'menus.restaurant_id')
                    ->where('menus.food_id', '=', $food_id);
            })
            ->select(DB::raw('ST_Distance(GeomFromText(\'POINT('.$lon.' '.$lat.')\'), restaurants.location) as distance, menus.id, menus.restaurant_id'))
            ->orderBy(DB::raw('ST_Distance(GeomFromText(\'POINT('.$lon.' '.$lat.')\'), restaurants.location)'))
            ->get();


            $respone = array();
            foreach ($db as $row) {
                $restaurant = Restaurant::find($row->restaurant_id);
                $menu_item = Menu::find($row->id);
                $menu_item->food;
                array_push($respone, array('menu_item' => $menu_item, 'restaurant'=>$restaurant, 'distance'=>$row->distance));
            }


       // dd($db);

        return Response::json(array('error'=> false, '$recomendations'=>$respone), 200);
    }


}
