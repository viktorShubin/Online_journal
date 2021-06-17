<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discipl_tables extends Model
{
    use HasFactory;
    public function userForDiscipl() {
        return $this->hasMany('App\Models\evtype_tables','id_discipl','id');
    }
}
