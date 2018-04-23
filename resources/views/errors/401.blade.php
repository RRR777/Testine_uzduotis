@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                      {{ Auth::user()->name }}, Jūs sėkmingai prisijungėte! 
                      <button onclick='location.href="{{url('/home')}}"' type="button" class="btn btn-info float-right">Pradinis</button>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif                      
                        <h1 class="text-center">{{ $exception->getMessage() }}</h1>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection