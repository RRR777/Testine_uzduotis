<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $time = 'H:i';
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

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
