@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Pasirinkite transporto priemonę</h1></div>

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
                        </tr>
                      </thead>
                      <tbody>
                          <?php $counter = 1 ?> 
                          @foreach ($autos as $auto)
                            <tr>
                              <th scope="row">{{ $counter++ }}</th>
                              <td><a href = "{{url('autos', $auto->id) }}">{{$auto->name}}</a> </td>
                              <td><a href = "{{url('autos', $auto->id) }}">{{$auto->number}}</a> </td>
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