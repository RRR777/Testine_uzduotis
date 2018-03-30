@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}, You are logged in! </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                      
                    <h1 class="text-center">Transporto priemonių valdymas</h1>
                    <div class="container">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-md-3">
                                <button type="button" onclick="location.href='{{url('autos/create')}}'" class="btn btn-secondary">Įvesti tranporto priemonę</button>
                            </div>
                            <div class="col-md-3" >
                                <button type="submit" onclick="location.href='{{url('autos')}}'" class="btn btn-secondary">Automobiliai</button>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" onclick="location.href='{{url('trips')}}'"class="btn btn-secondary">Kelionės ataskaita</button>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" onclick="location.href='{{url('users')}}'" class="btn btn-secondary">Vartotojai</button>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
