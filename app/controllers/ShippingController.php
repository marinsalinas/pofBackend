<?php

class ShippingController extends \BaseController {

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

       // $orders = Auth::user()->getUser()->orders()->where('status', '!=','Entregado')->with('device.report')->get();
        //$orders = User::find(2)->orders()->where('status', '!=','Entregado')->with('device.last_report')->get();

        $orders = Auth::user()->getUser()->orders()->where('status', '!=','Entregado')->with('device.last_report')->get();

       // return $orders;

        for($i = 0; $i<=0; $i++){

            //return $orders[0];
            //return $orders[0]->device->id;
            $report =  Report::where('idDevice', '=', $orders[0]->device->imei)
                ->where('eventDate', '>=', $orders[0]->created_at)
                ->get();

            return $orders[0]->created_at . "<=" . $report[1]->eventDate;
        }
die();

 //       return $orders;

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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $orders = Auth::user()->getUser()->orders()
            ->where('id', '=', $id)
            ->where('status', '!=','Entregado')->with('device.last_report')->get();
        return $orders;
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
