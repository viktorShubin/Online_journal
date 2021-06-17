<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_tables extends Model
{
    use HasFactory;
    public function disciplinForGroup() {
        return $this->hasMany('App\Models\discipl_tables','id_discipl','id_discipl');
    }
    public function grnameForGroup() {
        return $this->hasMany('App\Models\grname_tables','id_grname','id_grname');
    }
}
