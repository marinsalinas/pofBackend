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
        //EL user se obtiene del Auth:user();
        /*{
        orders: {
                address_id: 3
                restaurant_id: 4
                items_id: [n]
                    0:  1
                    1:  2
                    2:  3
                    3:  4
                    n:  2
                items_q: [n]
                    0:  4
                    1:  3
                    2:  4
                    3:  5
                    n: 5
        }*/




        return Response::json(array('error'=>false,'orders'=>Input::all()),200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id)->first();

        if($restaurant == null){
            return Response::json(array('error'=>true, 'message'=>'No se encontro restaurante'), 400);
        }

        $restaurant->menu;

        return Response::json(array("error"=>false, 'restaurant'=>$restaurant), 200);
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
