<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportPoint extends Model
{
    protected $fillable = ['name', 'description', 'mapboxId'];

    public function marker()
    {
        $this->hasMany('App\Marker');
    }
}
