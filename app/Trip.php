<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $fillable = [
        'date',
        'route', 
        'timeStart', 
        'timeToCustomer', 
        'timeFromCustomer', 
        'timeEnd', 
        'spidometerStart', 
        'spidometerEnd', 
        'timeunload', 
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
}
