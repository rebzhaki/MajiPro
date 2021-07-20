<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments=Payment::all();
        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers=Customer::all();
        return view('payment.create',compact('customers'));
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
        $input=$request->all();
        $payment=Payment::create($input);
        $this->clearBills($payment);
        return redirect('/payment/'.$payment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
        return view('payment.show', compact('payment'));
    }

    public function clearBills($payment){
        $bills=Bill::where('status','!=', 'Paid')->where('customer_id','=', $payment->customer_id)->get();
        $amount=$payment->amount;
        foreach($bills as $bill){
            if($bill->balance < $amount){
                $billPaymentD=['bill_id'=>$bill->id, 'payment_id'=>$payment->id, 'amount'=>$bill->balance];
                $billPayment=BillPayment::create($billPaymentD);
                $billD=array();
                $billD['status']='Paid';
                $billD['balance']=0;
                $bill->update($billD);
                $amount=$amount-$bill->balance;
            }
            elseif($bill->balance > $amount && $amount >0){
                $billD=array();
                $billD['status']='Partially Paid';
                $billD['balance']=$bill->balance-$amount;
                $bill->update($billD);
                $billPaymentD=['bill_id'=>$bill->id, 'payment_id'=>$payment->id, 'amount'=>$amount];
                $billPayment=BillPayment::create($billPaymentD);
                $amount=0;
            }
        }
    }

    public function unclearBills($payment){
        $billPayments=BillPayment::where('payment_id','=',$payment->id)->get();
        foreach($billPayments as $billPayment){
            $bill=$billPayment->bill;
            if($bill->amount <= ($bill->balance+$billPayment->amount)){
            $billD=array();
            $billD['status']='UnPaid';
            $billD['balance']=$bill->balance+$billPayment->amount;
            $bill->update($billD);
            }
            else{
            $billD=array();
            $billD['status']='Partially Paid';
            $billD['balance']=$bill->balance+$billPayment->amount;
            $bill->update($billD);$bill=$billPayment->bill;
            }
            $billPayment->delete();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
        $customers=Customer::all();
        return view('payment.edit', compact('payment','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $input=$request->all();
        $this->unclearBills($payment);
        $payment->update($input);
        $this->clearBills($payment);
        return redirect('/payment/'.$payment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
        $this->unclearBills($payment);
        $payment->delete();
        return redirect('/payment');
    }
}
