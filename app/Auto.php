<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $table = 'autos';
    protected $fillable = ['name','number', 'stop', 'drive', 'unload'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::creator_id);
    }

    public function updator()
    {
        return $this->belongsTo(User::updator_id);
    }

}

