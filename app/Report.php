<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }

    public function trips()
    {
        return $this->belongsTo(Trip::class);
    }
}
