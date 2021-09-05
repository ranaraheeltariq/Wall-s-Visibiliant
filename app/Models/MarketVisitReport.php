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
    protected $fillable = ['user_id', 'territory_id','visiting_area','visiting_route','visit_with','visit_with_designation','channel','retailer','retailer_code','bar_code','retailer_type','stock_level','cabinet_type','cabinet_condition','cotc_availability','new_innovation_status','house_keeping','price_card_condition','new_innovation_posm','walls_visibility','cabinet_placement','cabinet_position_change','competition_visibility','competition_visibility_type','verification','images','remarks','retailer_contact','retailer_feedback'];
}
