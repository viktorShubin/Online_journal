<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score_tables extends Model
{
    use HasFactory;
    public function disciplinForScore() {
        return $this->hasMany('App\Models\discipl_tables','id_discipl','id_discipl');
    }
    public function userForScore() {
        return $this->hasMany('App\Models\User','id','id_user');
    }

    public function octypeForScore() {
        return $this->hasMany('App\Models\octype_tables','id_octype','id_octype');
    }
    public function eventForScore() {
        return $this->hasMany('App\Models\event_tables','id_event','id_event');
    }
    public function grnameForScore() {
        return $this->hasMany('App\Models\grname_tables','id_grname','id_grname');
    }
}
