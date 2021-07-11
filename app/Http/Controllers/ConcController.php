<?php

namespace App\Http\Controllers;

use App\Models\Conc;
use Illuminate\Http\Request;

class ConcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getconc(Request $request)
    {
        $conc = Conc::where('region_id',$request->region_id)->get();
        return response()->json($conc);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conc  $conc
     * @return \Illuminate\Http\Response
     */
    public function show(Conc $conc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conc  $conc
     * @return \Illuminate\Http\Response
     */
    public function edit(Conc $conc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conc  $conc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conc $conc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conc  $conc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conc $conc)
    {
        //
    }
}
