<?php

namespace Cellar\CellarTracker;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $table = 'ct_tag';

    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('Cellar\User');
    }
}
