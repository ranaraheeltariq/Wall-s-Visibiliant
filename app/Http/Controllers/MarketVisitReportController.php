<?php

namespace App\Http\Controllers;

use App\Models\MarketVisitReport;
use Illuminate\Http\Request;

class MarketVisitReportController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketvisitreport');
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
     * @param  \App\Models\MarketVisitReport  $marketVisitReport
     * @return \Illuminate\Http\Response
     */
    public function show(MarketVisitReport $marketVisitReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarketVisitReport  $marketVisitReport
     * @return \Illuminate\Http\Response
     */
    public function edit(MarketVisitReport $marketVisitReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarketVisitReport  $marketVisitReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketVisitReport $marketVisitReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarketVisitReport  $marketVisitReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketVisitReport $marketVisitReport)
    {
        //
    }
}
