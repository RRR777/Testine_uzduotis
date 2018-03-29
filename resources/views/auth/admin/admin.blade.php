@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    {{ Auth::user()->name }}, You are logged in!

                    <h1 class="text-center">Transporto priemonių valdymas</h1>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <button type="button" onclick="location.href='{{url('autos/create')}}'" class="btn btn-secondary">Įvesti tranporto priemonę</button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-secondary">Kelionės ataskaita</button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-secondary">Vartotojai</button>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
