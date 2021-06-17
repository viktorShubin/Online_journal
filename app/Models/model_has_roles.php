<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_has_roles extends Model
{
    use HasFactory;

    public function rolesForUs() {
        return $this->hasMany('App\Models\roles','role_id','id');
    }
}
