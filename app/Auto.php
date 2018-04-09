<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = ['name','number', 'stop', 'drive', 'unload', 'creator_id'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updator()
    {
        return $this->belongsTo(User::class, 'updator_id');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

}

