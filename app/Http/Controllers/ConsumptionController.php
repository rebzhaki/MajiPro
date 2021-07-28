<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consumptions=Consumption::all();
        return view('consumption.index', compact('consumptions'));
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
        return view('consumption.create',compact('customers'));
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
        $input['user_id']=Auth::user()->id;
        $input['consumption']=$input['current_reading']-$input['previous_reading'];
        $consumption=Consumption::create($input);
        return redirect('/consumption/'.$consumption->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function show(Consumption $consumption)
    {
        //
        
        return view('consumption.show', compact('consumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumption $consumption)
    {
        //
        
        $customers=Customer::all();
        return view('consumption.edit', compact('consumption','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumption $consumption)
    {
        //
        $input=$request->all();
        $consumption->update($input);
        return redirect('/consumption/'.$consumption->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumption $consumption)
    {
        //
        $consumption->delete();
        return redirect('/consumption');
    }
}
