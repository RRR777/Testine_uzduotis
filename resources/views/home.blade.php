@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ Auth::user()->name }}, Jūs sėkmingai prisijungėte!
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-center">Transporto priemonių valdymas</h1>
                    <br>
                    @if (Auth::check() && Auth::user()->hasrole('admin'))
                    <div class="container">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-md-2">
                                <button type="button"
                                        onclick="location.href='{{url('autos/create')}}'"
                                        class="btn btn-info">
                                        Įvesti Auto
                                </button>
                            </div>
                            <div class="col-md-2" >
                                <button type="submit"
                                        onclick="location.href='{{url('autos')}}'"
                                        class="btn btn-info">
                                        Įvesti kelionę
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit"
                                        onclick="location.href='{{url('trips')}}'"
                                        class="btn btn-info">
                                        Visos Kelionės
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit"
                                        onclick="location.href='{{url('users')}}'"
                                        class="btn btn-info">
                                        Vartotojai
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit"
                                        onclick="location.href='{{url('reports/create')}}'"
                                        class="btn btn-info">
                                        Kelionės Ataskaita
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (Auth::check() && Auth::user()->hasrole('manager'))
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-md-8" >
                            <button type="submit"
                                    onclick="location.href='{{url('autos')}}'"
                                    class="btn btn-info">
                                    Įvesti kelionę
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
