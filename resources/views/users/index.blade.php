@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Vartotojų sąrašas</span>
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
                        <table class="table table-sm table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Eil.Nr.</th>
                              <th scope="col">Vardas</th>
                              <th scope="col">Elektroninis paštas</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $counter = 1 ?> 
                              @foreach ($users as $user)
                                <tr>
                                  <th scope="row">{{ $counter++ }}</th>
                                  <td>{{$user->name}}</a> </td>
                                  <td>{{$user->email}}</a> </td>
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