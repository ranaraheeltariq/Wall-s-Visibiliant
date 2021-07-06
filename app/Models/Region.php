<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    // *********************** START PARENT CLASS ****************************

    // *********************** END PARENT CLASS *******************************

    // *********************** START CHILD CLASS ******************************

     /**
     * Get the concs of the Region.
     */
    public function concs()
    {
        return $this->hasMany(Conc::class);
    }

    /**
     * Get the users of the Region.
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
    protected $fillable = ['name',];
}
