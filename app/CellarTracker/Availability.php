<?php

namespace Cellar\CellarTracker;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model
{
    protected $table = 'ct_availability';

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('Cellar\User');
    }

    public function consumed()
    {
        return $this->hasOne('Cellar\CellarTracker\Consumed', 'i_wine', 'i_wine');
    }

    public function purchase()
    {
        return $this->hasOne('Cellar\CellarTracker\Purchase', 'i_wine', 'i_wine');
    }

    public function privateNotes()
    {
        return $this->hasOne('Cellar\CellarTracker\PrivateNotes', 'i_wine', 'i_wine');
    }

    public function pending()
    {
        return $this->hasOne('Cellar\CellarTracker\Pending', 'i_wine', 'i_wine');
    }

    public function inventory()
    {
        return $this->hasMany('Cellar\CellarTracker\Inventory', 'i_wine', 'i_wine');
    }

    public function notes()
    {
        return $this->hasOne('Cellar\CellarTracker\Notes', 'i_wine', 'i_wine');
    }

    public function proReview()
    {
        return $this->hasOne('Cellar\CellarTracker\ProReview', 'i_wine', 'i_wine');
    }

    public function wineList()
    {
        return $this->hasOne('Cellar\CellarTracker\WineList', 'i_wine', 'i_wine');
    }
}
