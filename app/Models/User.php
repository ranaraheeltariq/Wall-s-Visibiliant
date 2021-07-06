<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $dates = ['deleted_at'];

    // *********************** START PARENT CLASS *****************************

    /**
     * Get the department associated with the users.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the department associated with the users.
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get the department associated with the users.
     */
    public function conc()
    {
        return $this->belongsTo(Conc::class);
    }

    /**
     * Get the department associated with the users.
     */
    public function territory()
    {
        return $this->belongsTo(Territory::class);
    }

    // *********************** END PARENT CLASS *******************************

    // *********************** START CHILD CLASS ******************************

    /**
     * Get the Market Visit Reports of the user.
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
    protected $fillable = [
        'employeeid',
        'name',
        'username',
        'email',
        'mobile',
        'designation',
        'password',
        'department_id',
        'region_id',
        'conc_id',
        'territory_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
