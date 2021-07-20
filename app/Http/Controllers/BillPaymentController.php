<?php

namespace App\Http\Controllers;

use App\Models\BillPayment;
use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Http\Request;

class BillPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $billpayments=BillPayment::all();
        return view('billPayment.index', compact('billpayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bills=Bill::all();
        $payments=Payment::all();
        return view('billPayment.create', compact('bills', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input=request->all();
        $billPayment=BillPayment::create($input);
        return redirect('/billPayment'.$billPayment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function show(BillPayment $billPayment)
    {
        //
      
        return view('billPayment.show', compact('billPayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(BillPayment $billPayment)
    {
        //
        
        $bills=Bill::all();
        $payments=Payment::all();
        return view('billPayment.edit', compact('billPayment','bills', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillPayment $billPayment)
    {
        //
        $input=$request->all();
       
        $billPayment->update($input);
        return redirect('billPayment'.$billPayment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillPayment $billPayment)
    {
        //
        
        $billPayment->delete();
        return redirect('/billPayment');
    }
}
