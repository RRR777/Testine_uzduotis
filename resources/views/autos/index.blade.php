@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Pasirinkite transporto priemonę</span>
                    <button onclick='location.href="{{url('/home')}}"'
                            type="button"
                            class="btn btn-info float-right">
                            Pradinis
                    </button>
                </div>
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
                              <th scope="col">Transporto priemonė</th>
                              <th scope="col">Valstybinis Numeris</th>
                              <th scope="col">Stovėjimas, l/h</th>
                              <th scope="col">Važiavimas, l/h</th>
                              <th scope="col">Iškrovimas, l/h</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $counter = 1 ?>
                              @foreach ($autos as $auto)
                                <tr>
                                  <th scope="row">{{ $counter++ }}</th>
                                  <td><a href = "/trips/{{$auto->id}}/create">
                                        {{$auto->name}}
                                      </a>
                                  </td>
                                  <td><a href = "/trips/{{$auto->id}}/create">
                                            {{$auto->number}}
                                      </a> 
                                  </td>
                                  <td><a href = "/trips/{{$auto->id}}/create">
                                            {{$auto->stop}}
                                      </a> 
                                  </td>
                                  <td><a href = "/trips/{{$auto->id}}/create">
                                        {{$auto->drive}}
                                      </a>
                                  </td>
                                  <td><a href = "/trips/{{$auto->id}}/create">
                                        {{$auto->unload}}
                                      </a> 
                                  </td>
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
