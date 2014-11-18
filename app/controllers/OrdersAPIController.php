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
        return Response::json(array('error'=>false,'orders'=>'HOLA'),200);
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


}
