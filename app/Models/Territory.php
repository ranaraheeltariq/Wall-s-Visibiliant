<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    use HasFactory;

    // *********************** START PARENT CLASS *****************************

    /**
     * Get the conc associated with the territory.
     */
    public function conc()
    {
        return $this->belongsTo(Conc::class);
    }

    // *********************** END PARENT CLASS *******************************

    // *********************** START CHILD CLASS ******************************

    /**
     * Get the users of the Territory.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the Market Visit Reports of the territory.
     */
    public function marketvisitreports()
    {
        return $this->hasMany(MarketVisitReport::class);
    }

    // *********************** END CHILD CLASS ********************************

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'conc_id',];
}
