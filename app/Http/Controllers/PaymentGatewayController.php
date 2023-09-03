<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use App\Http\Requests\StorePaymentGatewayRequest;
use App\Http\Requests\UpdatePaymentGatewayRequest;
use Illuminate\Http\Request;


class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pgs = PaymentGateway::all();
       return view('payment.paymentGateway')->with('pgs',$pgs);
    }

    public function paymentEdit($id)
    {
       $pg = PaymentGateway::find($id);
       $message = "";
       return view('payment.paymentEdit')->with('pg',$pg)->with('message',$message);
    }
    

    public function paymentUpdate(Request $request, $id)
    {
       $pg = PaymentGateway::find($id);

       $pg->name = $request->name;
       $pg->ClientAppKey = $request->ClientAppKey;
       $pg->ClientAppCode = $request->ClientAppCode;
       $pg->Accountid = $request->Accountid;
       $pg->save();

       $message = "Datos cargados correctamente";
       return view('payment.paymentEdit')->with('pg',$pg)->with('message',$message);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentGatewayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentGatewayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentGateway $paymentGateway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentGateway $paymentGateway)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentGatewayRequest  $request
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentGatewayRequest $request, PaymentGateway $paymentGateway)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentGateway  $paymentGateway
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentGateway $paymentGateway)
    {
        //
    }
}
