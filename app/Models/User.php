<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'f_name',
        's_name',
        't_name',
        'phone_num',
        'email',
        'password',
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

    public function userforgr() {
        return $this->hasMany('App\Models\userforgroup_tables','id_user','id');
    }
    public function disciplforUs() {
        return $this->hasMany('App\Models\discipl_tables','id_user','id');
    }
    public function scoreUs() {
        return $this->hasMany('App\Models\score_tables','id_user','id');
    }
}
