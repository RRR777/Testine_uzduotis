<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Auto;
use App\User;


class AutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autos = Auto::all();
        return view('autos.index', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'number' => 'required|unique:autos,number',
            'stop' => 'required',
            'drive' => 'required',
            'unload' => 'required'
        ]);

        //Auto::create(request(['name', 'number', 'stop', 'drive', 'unload', 'creator_id' => 'Auth::user()->id']));

       //or

/*         Auto::create([
            'name' => request('name'),
            'number' => request('number'),
            'stop' => request('stop'),
            'drive' => request('drive'),
            'unload' => request('unload'),
            'creator_id' => Auth::user()->id
        ]); */

        $auto = new Auto;
        $auto->name = $request->name;
        $auto->number = request('number');
        $auto->stop = request('stop');
        $auto->drive = request('drive');
        $auto->unload = request('unload');
        $auto->creator_id = Auth::user()->id;
        $auto->save();


        //and then redirect to the home page
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
            //$auto = Auto::find($id);
            return view('trips/create', compact('auto'));
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
