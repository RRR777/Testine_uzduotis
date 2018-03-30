<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Trip;
use App\Auto;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        $auto = Auto::all();
        return view('trips.index', compact('trips', 'auto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Auto $auto)
    {
        //return "This is TripControllers create funkcija";
        //$auto = Auto::find($id);
        return view('trips.create', compact('auto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Auto $auto)
    {
        $this->validate(request(),[
            'date' => 'required|date',
            'route' => 'required|string',
            'timeStart' => 'required',
            'timeToCustomer' => 'required',
            'timeFromCustomer' => 'required',
            'timeEnd' => 'required',
            'spidometerStart' => 'required|numeric',
            'spidometerEnd' => 'required|numeric',
            'timeunload' => 'required|numeric'
        ]);
        
        $trip = new Trip;
        $trip->user_id = Auth::user()->id;
        $trip->auto_id = $auto->id;
        $trip->date = request('date');
        $trip->route = request('route');
        $trip->timeStart = request('timeStart');
        $trip->timeToCustomer = request('timeToCustomer');
        $trip->timeFromCustomer = request('timeFromCustomer');
        $trip->timeEnd = request('timeEnd');
        $trip->spidometerStart = request('spidometerStart');
        $trip->spidometerEnd = request('spidometerEnd');
        $trip->timeunload = request('timeunload');
        $trip->distance = request('spidometerEnd') - request('spidometerStart');

        function time_Diff_Minutes($startTime, $endTime) {
            $to_time = strtotime($endTime);
            $from_time = strtotime($startTime);
            $minutes = ($to_time - $from_time) / 60; 

            return ($minutes < 0 ? 0 : abs($minutes));   
        }                                     
        
        $stop = time_Diff_Minutes($trip->timeToCustomer, $trip->timeFromCustomer) - $trip->timeunload;
        $drive = time_Diff_Minutes($trip->timeStart, $trip->timeToCustomer) + time_Diff_Minutes($trip->timeFromCustomer, $trip->timeEnd);                                    
        $fuel = round(($stop / 60 * $trip->auto->stop) + ($drive / 60 * $trip->auto->drive) + ($trip->timeunload / 60 * $trip->auto->unload), 2);

        $trip->fuel = $fuel;
        $trip->save();




        //and then redirect to the home page
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
