<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conc extends Model
{
    use HasFactory;

    // *********************** START PARENT CLASS *****************************

    /**
     * Get the region associated with the conc.
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    // *********************** END PARENT CLASS *******************************

    // *********************** START CHILD CLASS ******************************

    /**
     * Get the territories of the conc.
     */
    public function territories()
    {
        return $this->hasMany(Territory::class);
    }

    /**
     * Get the users of the Conc.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // *********************** END CHILD CLASS ********************************

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'region_id',];
}
