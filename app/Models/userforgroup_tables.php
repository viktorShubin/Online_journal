<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userforgroup_tables extends Model
{
    use HasFactory;
    public function userForGroupUs() {
        return $this->hasMany('App\Models\User','id','id_user');
    }
    public function groupForUs() {
        return $this->hasMany('App\Models\grname_tables','id_grname','id_grname');
    }
}
