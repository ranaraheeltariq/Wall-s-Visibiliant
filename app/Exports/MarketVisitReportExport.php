<?php

namespace App\Exports;

use App\Models\MarketVisitReport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MarketVisitReportExport implements FromView
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.report', [
            'marketvisitsreport' => $this->data
        ]);
    }
}
