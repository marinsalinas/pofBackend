<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 18/11/2014
 * Time: 09:41 PM
 */

class DevicesAPIController extends BaseController {

    function __construct() {
        //Con esto le digo que no le aplique el filtro a la funcion store.
        $this->beforeFilter('auth.token');
        // ...
    }

    public function index()
    {
        $ordersDevice = array();
        foreach (Auth::user()->user()->orders()->where('status', '!=', 'Entregado')->get() as $order) {
            $dev= $order->device;
            $dev->last_report = LastReport::where('idDevice', '=', $dev->imei)->get();
            array_push($ordersDevice, $order);
        }
        return Response::json(array('error'=>false, 'orders'=>$ordersDevice),200);

    }

    public function create()
    {

    }

    public function edit($name)
    {

    }

    public function update($id)
    {

    }

    public function store()
    {

    }

    public function destroy($id)
    {


    }
} 