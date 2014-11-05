<?php

class AddressAPIController extends \BaseController {


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
		return Response::json(array('addressbook'=>Auth::user()->address),200);
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
        $validacion = Validator::make(Input::all(), [
            'label' => 'required|unique:address,label,NULL,id,user_id,'.Auth::user()->id,
            'description' => 'required',
            'textaddress' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validacion->fails()) {
            return Response::json(array('error' => true, 'messages' => $validacion->messages()), 400);
        }

        $user = Auth::user();
        $address = new Address;
        $address->label = Input::get('label');
        $address->description = Input::get('description');
        $address->textaddress = Input::get('textaddress');
        $address->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));
        //Asi grabas con relaciones :) es hermosamente hermoso.
        $user->address()->save($address);

        return Response::json(array("error"=>false, "address"=>$address), 200);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		$user = Auth::user();
        $address = $user->address()->where('id', '=' ,$id)->first();

        if($address == null){
            return Response::json(array('error'=>true, 'message'=>'No se encontro dirección en la libreta de direcciones'), 400);
        }

        $validacion = Validator::make(Input::all(), [
            'label' => 'required|unique:address,label,'.$id.',id,user_id,'.Auth::user()->id,
            'description' => 'required',
            'textaddress' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validacion->fails()) {
            return Response::json(array('error' => true, 'messages' => $validacion->messages()), 400);
        }

        $address->label = Input::get('label');
        $address->description = Input::get('description');
        $address->textaddress = Input::get('textaddress');
        $address->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));
        //Asi grabas con relaciones :) es hermosamente hermoso.
        $user->address()->save($address);

        return Response::json(array("error"=>false, "address"=>$address), 200);
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
