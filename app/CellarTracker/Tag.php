<?php

namespace Cellar\CellarTracker;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('Cellar\User');
    }
}
