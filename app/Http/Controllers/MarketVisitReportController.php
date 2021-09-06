<?php

namespace App\Http\Controllers;

use App\Models\MarketVisitReport;
use App\Models\User;
use App\Models\Territory;
use App\Models\Region;
use App\Models\Conc;
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
        $territory = $user->territory_id;
        $conc = $user->conc_id;
        $region = $user->region_id;

        // if($territory == null && $conc == null && $region == null)
        if($conc == null && $region == null){
            $regions = Region::all();
            $concs = Conc::all();
            $territory = Territory::all();
            $data = ([
                'regions'       =>  $regions,
                'concs'         =>  $concs,
                'territories'   =>  $territory,
            ]);
        }
        // else if($territory == null && $conc == null && $region != null){
        else if($conc == null && $region != null){
            $regions = Region::where('id', $region)->get();
            $concs = Conc::where('region_id',$region)->get();
            $contemp = array();
            foreach($concs as $tr)
            {
                $contemp[] = $tr->id;
            }
            $territories = Territory::whereIn('conc_id',$contemp)->get();

            $data = ([
                'regions'       =>  $regions,
                'concs'         =>  $concs,
                'territories'   =>  $territories,
            ]);
        }
        // else if($territory == null && $conc != null && $region != null){
        else if($conc != null && $region != null){
            $regions = Region::where('id', $region)->get();
            $concs = Conc::where('id',$conc)->get();
            $contemp = array();
            foreach($concs as $tr)
            {
                $contemp[] = $tr->id;
            }
            $territories = Territory::whereIn('conc_id',$contemp)->get();

            $data = ([
                'regions'       =>  $regions,
                'concs'         =>  $concs,
                'territories'   =>  $territories,
            ]);
        }
        // else if($territory != null && $conc != null && $region != null){
        //     $regions = Region::where('id', $region)->get();
        //     $concs = Conc::where('id',$conc)->get();
        //     $territories = Territory::where('id',$territory)->get();

        //     $data = ([
        //         'regions'       =>  $regions,
        //         'concs'         =>  $concs,
        //         'territories'   =>  $territories,
        //     ]);
        // }
        return view('marketvisitreport')->with(['user'=>$user,'data'=>$data]);
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
                'region'                        => 'required|integer',
                'conc'                          => 'required|integer',
                'territory_id'                  => 'required|integer',
                'visiting_area'                 => 'required|string',
                'visiting_route'                => 'required|string',
                'visit_with'                    => 'nullable|string',
                'visit_with_designation'        => 'nullable|in:AM,TM,VM',
                'channel'                       => 'required|string',
                'retailer'                      => 'required|string',
                'retailer_code'                 => 'required|string',
                'bar_code'                      => 'required|string',
                'retailer_type'                 => 'required|in:Economy,Standard,Premium',
                'stock_level'                   => 'required|string',
                'cabinet_type'                  => 'required|array|min:1',
                'cabinet_type.*'                => 'required|string',
                'cabinet_condition'             => 'required|string',
                'cotc_availability'             => 'required|array|min:1',
                'cotc_availability.*'           => 'required|string',
                'new_innovation_status'         => 'required|array|min:1',
                'new_innovation_status.*'       => 'required|string',
                'house_keeping'                 => 'required|array|min:1',
                'house_keeping.*'               => 'required|string',
                'price_card_condition'          => 'nullable|string',
                'new_innovation_posm'           => 'nullable|string',
                'walls_visibility'              => 'required|array|min:1',
                'walls_visibility.*'            => 'required|string',
                'cabinet_placement'             => 'required|array|min:1',
                'cabinet_placement.*'           => 'required|string',
                'cabinet_position_change'       => 'nullable|array|min:1',
                'cabinet_position_change.*'     => 'nullable|string',
                'competition_visibility'        => 'nullable|array|min:1',
                'competition_visibility.*'      => 'nullable|string',
                'competition_visibility_type'   => 'nullable|array|min:1',
                'competition_visibility_type.*' => 'nullable|string',
                'verification'                  => 'required|array|min:1',
                'verification.*'                => 'required|string',
                'images'                        => 'nullable|image',
                'retailer_contact'              => 'nullable|string',
                'retailer_feedback'             => 'nullable|string',
        ]);
        $image = null;
        if($request->has('images')){
        $file = $request->file('images');
        $image = time().$file->getClientOriginalName();
        $file->move(public_path('images/visitreport'), $image);
        }
        $data = ([
            'user_id'                       =>  Auth::user()->id,
            'territory_id'                  =>  $request->territory_id,
            'visiting_area'                 =>  $request->visiting_area,
            'visiting_route'                =>  $request->visiting_route,
            'visit_with'                    =>  $request->visit_with,
            'visit_with_designation'        =>  $request->visit_with_designation,
            'channel'                       =>  $request->channel,
            'retailer'                      =>  $request->retailer,
            'retailer_code'                 =>  $request->retailer_code,
            'bar_code'                      =>  $request->bar_code,
            'retailer_type'                 =>  $request->retailer_type,
            'stock_level'                   =>  $request->stock_level,
            'cabinet_type'                  =>  serialize($request->cabinet_type),
            'cabinet_condition'             =>  $request->cabinet_condition,
            'cotc_availability'             =>  serialize($request->cotc_availability),
            'new_innovation_status'         =>  serialize($request->new_innovation_status),
            'house_keeping'                 =>  serialize($request->house_keeping),
            'price_card_condition'          =>  $request->price_card_condition,
            'new_innovation_posm'           =>  $request->new_innovation_posm,
            'walls_visibility'              =>  serialize($request->walls_visibility),
            'cabinet_placement'             =>  serialize($request->cabinet_placement),
            'cabinet_position_change'       =>  $request->cabinet_position_change == null ? null : serialize($request->cabinet_position_change),
            'competition_visibility'        =>  $request->competition_visibility == null ? null : serialize($request->competition_visibility),
            'competition_visibility_type'   =>  $request->competition_visibility_type == null ? null : serialize($request->competition_visibility_type),
            'verification'                  =>  serialize($request->verification),
            'remarks'                       =>  $request->remarks,
            'retailer_contact'              =>  $request->retailer_contact,
            'retailer_feedback'             =>  $request->retailer_feedback,
            'images'                        =>  $image,
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
        $request->validate([
            'from'  => 'required',
            'to'    =>  'required',
        ]);
        $territory = $request->territory_id;
        $conc = $request->conc_id;
        $region = $request->region_id;
        if($territory != null){
            $data[] = $territory;
        }
        else if($territory == null && $conc != null){
            $ters = Territory::where('conc_id', $conc)->get();
            $conc = array();
            foreach($ters as $tr)
            {
                $conc[] = $tr->id;
            }
            $data = $conc;
            // dd($data);
        }
        else if($territory == null && $conc == null && $region != null){
            $cons = Conc::where('region_id',$region)->get();
            $region = array();
            foreach($cons as $co)
            {
                foreach($co->territories as $territ)
                {
                    $region[] = $territ->id;
                }
            }
            $data = $region;
        }
        // dd('error');

        $territory_reports = MarketVisitReport::whereIn('territory_id',$data)->whereBetween('created_at',[$request->from.' 00:00:00',$request->to." 23:59:59"])->get();
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
