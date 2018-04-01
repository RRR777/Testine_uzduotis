@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Kelionės ataskaita </span>
                    <button onclick='location.href="{{url('/home')}}"' type="button" class="btn btn-info float-right">Pradinis</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        @include('layouts.errors')
                        <table class="table table-sm table-hover table-responsive">
                          <thead>
                            <tr>
                              <th scope="col">Nr.</th>
                              <th scope="col">Data:</th>
                              <th scope="col">Maršrutas</th>
                              <th scope="col">Išvyko iš terminalo</th>
                              <th scope="col">Spidometro parodymai</th>
                              <th scope="col">Atvyko pas klientą</th>
                              <th scope="col">Iškrovimas, min</th>
                              <th scope="col">Išvyko iš kliento</th>
                              <th scope="col">Atvyko į terminalą</th>
                              <th scope="col">Spidometro parodymai</th>
                              <th scope="col">Atstumas</th>
                              <th scope="col">Kuras</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $counter = 1 ?> 
                              @foreach ($trips as $trip)
                                <tr>
                                  <th scope="row">{{ $counter++ }}</th>
                                  <td>{{ $trip->date }}</td>
                                  <td>{{ $trip->route }}</td>
                                  <td>{{ $trip->timeStart }}</td>
                                  <td>{{ $trip->spidometerStart }}</td>
                                  <td>{{ $trip->timeToCustomer }}</td>
                                  <td>{{ $trip->timeunload }}</td>
                                  <td>{{ $trip->timeFromCustomer }}</td>
                                  <td>{{ $trip->timeEnd }}</td>
                                  <td>{{ $trip->spidometerEnd }}</td>
                                  <td>{{ $trip->distance }}</td>
                                  <td>{{ $trip->fuel }}</td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
