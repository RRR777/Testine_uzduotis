<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTripRequest;
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
        return view('trips.create', compact('auto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTripRequest $request, Auto $auto)
    {
        $trip = new Trip;
        $trip->user_id = Auth::user()->id;
        $trip->auto_id = $auto->id;
        $trip->date = $request->input('date');
        $trip->route = $request->input('route');
        $trip->timeStart = $request->input('timeStart');
        $trip->timeToCustomer = $request->input('timeToCustomer');
        $trip->timeFromCustomer = $request->input('timeFromCustomer');
        $trip->timeEnd = $request->input('timeEnd');
        $trip->spidometerStart = $request->input('spidometerStart');
        $trip->spidometerEnd = $request->input('spidometerEnd');
        $trip->timeunload = $request->input('timeunload');
        $trip->distance = $request->input('spidometerEnd')
                        - $request->input('spidometerStart');
        //fuel calculation
        function time_Diff_Minutes($startTime, $endTime)
        {
            $to_time = strtotime($endTime);
            $from_time = strtotime($startTime);
            $minutes = ($to_time - $from_time) / 60;

            return ($minutes < 0 ? 0 : abs($minutes));
        }        
            $stop = time_Diff_Minutes($trip->timeToCustomer, $trip->timeFromCustomer)
                  - $trip->timeunload;
            $drive = time_Diff_Minutes($trip->timeStart, $trip->timeToCustomer)
                   + time_Diff_Minutes($trip->timeFromCustomer, $trip->timeEnd);
            $fuel = round(
                ($stop / 60 * $trip->auto->stop) 
                + ($drive / 60 * $trip->auto->drive) 
                + ($trip->timeunload / 60 * $trip->auto->unload), 2
            );

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

    public function fuelcalculation()
    {
        //
    }
}
