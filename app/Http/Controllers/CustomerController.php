<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Tarrif;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $this->authorize('viewAny', Customer::class);
         $customers=Customer::all();
         return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $this->authorize('create', Customer::class);
        $tarrifs=Tarrif::all();
        return view('customer.create',compact('tarrifs'));
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
        $this->authorize('create', Customer::class);
        $input=$request->all();
        $customer=Customer::create($input);
        return redirect('/customer/'.$customer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
         $this->authorize('view', $customer);
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        $this->authorize('update', $customer);
        $tarrifs=Tarrif::all();
        return view('customer.edit', compact('customer','tarrifs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $this->authorize('update', $customer);
        $input=$request->all();
        $customer->update($input);
        return redirect('/customer/'.$customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        $this->authorize('delete', $customer);
        $customer->delete();
        return redirect('/customer');
    }
}
