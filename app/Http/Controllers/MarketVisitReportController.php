<?php

namespace App\Http\Controllers;

use App\Models\MarketVisitReport;
use App\Models\User;
use App\Models\Territory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\Exports\MarketVisitReportExport;

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
        $user = Auth::user();
        $territory = Territory::where('conc_id',$user->conc_id)->get();
        return view('marketvisitreport')->with(['user'=>$user,'territories'=>$territory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'territory_id' => 'required|integer',
                'visiting_area' => 'required|string',
                'visiting_route' => 'required|string',
                'tm_market_name' => 'required|string',
                'channel' => 'required|string',
                'retailer' => 'required|string',
                'retailer_code' => 'required|string',
                'stock_level' => 'required|string',
                'cabinet_type' => 'required|array|min:1',
                'cabinet_type.*' => 'required|string',
                'cabinet_condition' => 'required|string',
                'cotc_availability' => 'required|array|min:1',
                'cotc_availability.*' => 'required|string',
                'new_innovation_status' => 'required|array|min:1',
                'new_innovation_status.*' => 'required|string',
                'new_innovation_posm' => 'required|array|min:1',
                'new_innovation_posm.*' => 'required|string',
                'walls_visibility' => 'required|array|min:1',
                'walls_visibility.*' => 'required|string',
                'cabinet_placement' => 'required|array|min:1',
                'cabinet_placement.*' => 'required|string',
                'competition_visibility' => 'required|array|min:1',
                'competition_visibility.*' => 'required|string',
                'competition_visibility_type' => 'required|array|min:1',
                'competition_visibility_type.*' => 'required|string',
                'images' => 'nullable|image',
        ]);
        $image = null;
        if($request->has('images')){
        $file = $request->file('images');
        $image = time().$file->getClientOriginalName();
        $file->move(public_path('images/visitreport'), $image);
        }
        $data = ([
            'user_id' => Auth::user()->id,
            'territory_id' => $request->territory_id,
            'visiting_area' => $request->visiting_area,
            'visiting_route' => $request->visiting_route,
            'tm_market_name' => $request->tm_market_name,
            'channel' => $request->channel,
            'retailer' => $request->retailer,
            'retailer_code' => $request->retailer_code,
            'stock_level' => $request->stock_level,
            'cabinet_type' => serialize($request->cabinet_type),
            'cabinet_condition' => $request->cabinet_condition,
            'cotc_availability' => serialize($request->cotc_availability),
            'new_innovation_status' => serialize($request->new_innovation_status),
            'new_innovation_posm' => serialize($request->new_innovation_posm),
            'walls_visibility' => serialize($request->walls_visibility),
            'cabinet_placement' => serialize($request->cabinet_placement),
            'competition_visibility' => serialize($request->competition_visibility),
            'competition_visibility_type' => serialize($request->competition_visibility_type),
            'remarks' => $request->remarks,
            'images' => $image,
        ]);
        // dd($data);
        MarketVisitReport::create($data);
        return back()->with('status','Report Successfully Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarketVisitReport  $marketVisitReport
     * @return \Illuminate\Http\Response
     */
    public function trerritoryreport(Request $request)
    {
        $territory_reports = MarketVisitReport::where('territory_id',$request->territory_id)->whereBetween('created_at',[$request->from.' 00:00:00',$request->to." 23:59:59"])->get();
        return Excel::download(new MarketVisitReportExport($territory_reports), 'Market Visit Report.xlsx');
    }

    // public function report()
    // {
    //     $territory_reports = MarketVisitReport::all();
    //     return view('exports.report', [
    //         'marketvisitsreport' => $territory_reports
    //     ]);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\MarketVisitReport  $marketVisitReport
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(MarketVisitReport $marketVisitReport)
    // {
    //     //
    // }
}
