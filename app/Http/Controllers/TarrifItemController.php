<?php

namespace App\Http\Controllers;

use App\Models\TarrifItem;
use App\Models\Tarrif;
use Illuminate\Http\Request;

class TarrifItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tarrifItems=TarrifItem::all();
        return view('tarrifItem.index', compact('$tarrifItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tarrifs=Tarrif::all();
        return view('tarrifItemtem.create', compact('tarrifs'));
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
        $tarrifItem=TarriflItem::create($input);
        return redirect('/tarrif/'.$tarrifItem->tarrif_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarrifItem  $tarrifItem
     * @return \Illuminate\Http\Response
     */
    public function show(TarrifItem $tarrifItem)
    {
        //
         return view('tarrifItem.show', compact('tarrifItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarrifItem  $tarrifItem
     * @return \Illuminate\Http\Response
     */
    public function edit(TarrifItem $tarrifItem)
    {
        //
        $Tarrifs=Tarrif::all();
        return view('tarrifItem.edit', compact('tarrifItem','Tarrifs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarrifItem  $tarrifItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarrifItem $tarrifItem)
    {
        //
        $input=$request->all();
        $tarrifItem->update($input);
        return redirect('/tarrif/'.$tarrifItem->tarrif_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarrifItem  $tarrifItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarrifItem $tarrifItem)
    {
        //
        $tarrif_id=$tarrifItem->tarrif_id;
        $tarrifItem->delete();
        return redirect('/tarrif/'.$tarrif_id);
    }
}
