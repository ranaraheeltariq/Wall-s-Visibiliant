<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketVisitReport extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    // *********************** START PARENT CLASS *****************************

    /**
     * Get the user associated with the report.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the territory associated with the report.
     */
    public function territory()
    {
        return $this->belongsTo(Territory::class);
    }

    // *********************** END PARENT CLASS *******************************

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'territory_id','visiting_area','visiting_route','tm_market_name','channel','retailer','retailer_code','stock_level','cabinet_type','cabinet_condition','cotc_availability','new_innovation_status','new_innovation_posm','walls_visibility','cabinet_placement','competition_visibility','competition_visibility_type','images','remarks'];
}
