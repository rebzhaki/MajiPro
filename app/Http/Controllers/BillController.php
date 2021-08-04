<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\BillItem;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('viewAny', Bill::class);
        $bills=Bill::all();
        return view('bill.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Bill::class);
        $customers=Customer::all();
        return view('bill.create',compact('customers'));
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
        $this->authorize('create', Bill::class);
        $input=$request->all();
        $customer=Customer::find($input['customer_id']);
        $tarrif=$customer->tarrif; 
        $biiItems=array();
        $billItems[]=['narrative'=>'Consumption in cubic meters', 'quantity'=>$input['consumption'], 'unit'=>$tarrif->price, 'amount'=>$input['consumption'] * $tarrif->price, 'status'=>'Active'];
        foreach($tarrif->tarrifItems as $item){
            if($item->type=='Fixed Amount'){
                $quantity=1;
                $unit=$item->amount;
                $amount=$quantity * $unit;
                
            }elseif($item->type == 'Amount per cubic meter'){
                $quantity=$input['consumption'];
                $unit=$item->amount;
                $amount=$quantity * $unit;

            }elseif($item->type =='% of consumption'){
                $quantity=$item->amount/100;
                $unit=$input['consumption'] * $tarrif->price;
                $amount=$quantity * $unit;
            }
        $billItems[]=['narrative'=>$item->name, 'quantity'=>$quantity, 'unit'=>$unit, 'amount'=>$amount, 'status'=>'Active'];
        }
         $total=array_sum(array_column($billItems,'amount'));
         $billD=['customer_id'=>$input['customer_id'], 'start_date'=>$input['start_date'], 'end_date'=>$input['end_date'], 'date'=>date('Y-m-d'), 'status'=>'Unpaid', 'balance'=>$total, 'amount'=>$total];
        $bill=Bill::create($billD);
        foreach($billItems as $item){
            $item['bill_id']=$bill->id;
            $billItem=BillItem::create($item);
        }
        return redirect('/bill/'.$bill->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
        $this->authorize('view', $bill);
        return view('bill.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
        $this->authorize('update', $bill);
        $customers=Customer::all();
        return view('bill.edit', compact('bill','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
        $this->authorize('update', $bill);
        $input=$request->all();
        $bill->update($input);
        return redirect('/bill/'.$bill->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
        $this->authorize('delete', $bill);
        $bill->delete();
        return redirect('/bill');
    }
}
