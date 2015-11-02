<?php

namespace Cellar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CTTag extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('Cellar\User');
    }
}
