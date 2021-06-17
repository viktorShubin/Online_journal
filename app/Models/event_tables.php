<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_tables extends Model
{
    use HasFactory;
    public function typeEventForEvent() {
        return $this->hasMany('App\Models\evtype_tables','id_evtype','id_evtype');
    }
    public function scoreForEvent() {
        return $this->hasMany('App\Models\score_tables','id_event','id_event');
    }

}
