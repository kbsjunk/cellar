<?php

namespace Cellar\CellarTracker;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends Model
{
    protected $table = 'ct_notes';

    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('Cellar\User');
    }

    public function availability()
    {
        return $this->hasOne('Cellar\CellarTracker\Availability', 'i_wine', 'i_wine');
    }

    public function consumed()
    {
        return $this->hasOne('Cellar\CellarTracker\Consumed', 'i_wine', 'i_wine');
    }

    public function inventory()
    {
        return $this->hasMany('Cellar\CellarTracker\Inventory', 'i_wine', 'i_wine');
    }

    public function wineList()
    {
        return $this->hasOne('Cellar\CellarTracker\WineList', 'i_wine', 'i_wine');
    }

    public function pending()
    {
        return $this->hasOne('Cellar\CellarTracker\Pending', 'i_wine', 'i_wine');
    }

    public function privateNotes()
    {
        return $this->hasOne('Cellar\CellarTracker\PrivateNotes', 'i_wine', 'i_wine');
    }

    public function proReview()
    {
        return $this->hasOne('Cellar\CellarTracker\ProReview', 'i_wine', 'i_wine');
    }

    public function purchase()
    {
        return $this->hasOne('Cellar\CellarTracker\Purchase', 'i_wine', 'i_wine');
    }
}
