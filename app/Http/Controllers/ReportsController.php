<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReportsRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;
use App\User;
use App\Auto;
use App\Trip;

class ReportsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user )
    {
        $users = User::orderBy('name', 'asc')->get();
        $autos = Auto::orderBy('name', 'asc')->orderBy('number', 'asc')->get();
        return view('reports.create', compact('users', 'autos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function report(CreateReportsRequest $request)
    {
        $year = Carbon::parse(request('month'))->format('Y-m');
        $month = Carbon::parse(request('month'))->format('m');

        $id = request('driver');
        $user = User::where('id', $id)->first();

        $trips = Trip::where('user_id', $id)
                        ->whereYear('date', $year)
                        ->whereMonth('date', $month)
                        ->get();

        return view('reports.report', compact(['trips', 'user', 'year']));
    }
}
