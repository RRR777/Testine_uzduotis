@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span class="display-4">Įveskite Naują transporto priemonę</span><button onclick='location.href="{{url('/home')}}"' type="button" class="btn btn-info float-right">Pradinis</button></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                                          
                    <div class="container">
                        @include('layouts.errors')
                        <form action="{{ url('/autos') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="name">Transporto priemonė</label>
                                      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Įveskite transporto priemonę" required>
                                      <small id="helpId" class="form-text text-muted">*Privalomas laukas</small>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="number">Valstybinis numeris</label>
                                      <input type="text" class="form-control" name="number" id="number" aria-describedby="helpId" placeholder="Įveskite valstybinį numerį" required>
                                      <small id="helpId" class="form-text text-muted">*Privalomas laukas</small>
                                    </div>
                                </div>
                            </div>

                            <h2>Kuro normos:</h2>
                            <div class="row justify-content-center">
                                <div class="col-md-4">                                    
                                    <div class="form-group">
                                      <label for="stop">Stovėjimas</label>
                                      <input type="number"
                                        class="form-control" name="stop" id="stop" aria-describedby="helpId" placeholder="Stovėjimo kuro norma" required>
                                      <small id="helpId" class="form-text text-muted">* Kuro norma l/h</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="drive">Važiavimas</label>
                                      <input type="number"
                                        class="form-control" name="drive" id="drive" aria-describedby="helpId" placeholder="Važiavimo kuro norma" required>
                                      <small id="helpId" class="form-text text-muted">* Kuro norma l/h</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="unload">Iškrovimas</label>
                                      <input type="number"
                                        class="form-control" name="unload" id="unload" aria-describedby="helpId" placeholder="Iškrovimo kuro norma" required>
                                      <small id="helpId" class="form-text text-muted">* Kuro norma l/h</small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary">Patvirtinti</button>
                        </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection