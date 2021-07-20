<?php

namespace App\Http\Controllers;

use App\Models\BillItem;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $billItems=BillItem::all();
        return view('billItem.index', compact('$billItems'));
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
        return view('billItem.create', compact('bills'));
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
        $billItem=BillItem::create($input);
        return redirect('/billItem'.$billItem->id);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillItem  $billItem
     * @return \Illuminate\Http\Response
     */
    public function show(BillItem $billItem)
    {
        //
        return view('billItem.show', compact('billItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillItem  $billItem
     * @return \Illuminate\Http\Response
     */
    public function edit(BillItem $billItem)
    {
        //
        $bills=Bill::all();
        return view('billItem.edit', compact('billItem','bills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillItem  $billItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillItem $billItem)
    {
        //
        $input=$request->all();
        $billItem->update($input);
        return redirect('billItem'.$billItem->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillItem  $billItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillItem $billItem)
    {
        //
        $billItem->delete();
        return redirect('/billItem');
    }
}
