<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // *********************** START PARENT CLASS ****************************

    // *********************** END PARENT CLASS *******************************

    // *********************** START CHILD CLASS ******************************

     /**
     * Get the users of the Department.
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
