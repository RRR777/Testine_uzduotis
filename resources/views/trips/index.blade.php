@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><span class="display-4">Kelionės ataskaita </span><button onclick='location.href="{{url('/home')}}"' type="button" class="btn btn-info float-right">Pradinis</button></div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                                    
                    <div class="container">
                        @include('layouts.errors')
                    <table class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Eil.Nr.</th>
                          <th scope="col">Auto_id</th>
                          <th scope="col">Automobilis</th>
                          <th scope="col">Valst.Nr.</th>
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
                              <td>{{ $trip->auto_id }}</td>
                              <td>{{ $trip->auto->name }}</td>
                              <td>{{ $trip->auto->number }}</td>
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
                    <div class="container">
                        @foreach( $trips as $trip)
                            @if( $trip->auto_id == 1)
                            {{--  {{ $trip->timeStart->diffInMinutes($trip->timeToCustomer) }}    --}}
                                <?php 
                                function time_Diff_Minutes($startTime, $endTime) {
                                    $to_time = strtotime($endTime);
                                    $from_time = strtotime($startTime);
                                     $minutes = ($to_time - $from_time) / 60; 
                                     return ($minutes < 0 ? 0 : abs($minutes));   
                                    } 

                                    $stop = time_Diff_Minutes($trip->timeToCustomer, $trip->timeFromCustomer) - $trip->timeunload;
                                    $drive = time_Diff_Minutes($trip->timeStart, $trip->timeToCustomer) + time_Diff_Minutes($trip->timeFromCustomer, $trip->timeEnd);

                                    $fuel = round(($stop / 60 * $trip->auto->stop) + ($drive / 60 * $trip->auto->drive) + ($trip->timeunload / 60 * $trip->auto->unload), 2);
                                    echo $stop . " + " . $drive . " + ". $trip->timeunload . " = " .$fuel;

                                    /* $to_time = strtotime($trip->timeToCustomer);
                                    $from_time = strtotime($trip->timeStart);
                                    echo round(abs($to_time - $from_time) / 60,2). " minute"; */
                                /* $time = $trip->timeStart->toDateString()->diffinMinutes($trip->timeToCustomer->toDateString()); */ ?>
                                {{--  {{"Labas" . $time}}   --}} 
                            @endif
                        @endforeach
                    </div>
                              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection