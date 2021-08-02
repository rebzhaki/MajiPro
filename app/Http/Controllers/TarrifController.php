<?php

namespace App\Http\Controllers;

use App\Models\Tarrif;
use Illuminate\Http\Request;

class TarrifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('viewAny', Tarrif::class);
        $tarrifs=Tarrif::all();
        return view('tarrif.index', compact('tarrifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Tarrif::class);
        return view('tarrif.create');
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
        $this->authorize('create', Tarrif::class);
        $input=$request->all();
        $tarrif=Tarrif::create($input);
        return redirect('/tarrif/'.$tarrif->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarrif  $tarrif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarrif $tarrif)
    {
        //
        $this->authorize('view', $tarrif);
        return view('tarrif.show', compact('tarrif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarrif  $tarrif
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarrif $tarrif)
    {
        //
        $this->authorize('update', $tarrif);
        return view('tarrif.edit', compact('tarrif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarrif  $tarrif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarrif $tarrif)
    {
        //
        $this->authorize('update', $tarrif);
        $input=$request->all();
        $tarrif->update($input);
        return redirect('/tarrif/'.$tarrif->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarrif  $tarrif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarrif $tarrif)
    {
        //
        $this->authorize('delete', $tarrif);
        $tarrif->delete();
        return redirect('/tarrif');
    }
}
