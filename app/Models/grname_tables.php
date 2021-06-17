<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grname_tables extends Model
{
    use HasFactory;
    public function groupAll() {
        return $this->hasMany('App\Models\group_tables','id_grname','id_grname');
    }
}
