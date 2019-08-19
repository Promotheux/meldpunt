<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{

    protected $fillable = ['location', 'community', 'latitude', 'longitude'];

    public function meldpunt()
    {
        $this->belongsTo('App\ReportPoint');
    }
}
