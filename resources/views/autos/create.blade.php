@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span class="h2">Įveskite Naują transporto priemonę</span><button onclick='location.href="{{url('/home')}}"' type="button" class="btn btn-info float-right">Pradinis</button></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                                          
                    <div class="container">
                        @include('layouts.errors')
                        <form class="needs-validation" novalidate action="{{ url('/autos/{auto}') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-3 mb-3">                                    
                                    <label for="validationServer01">Transporto priemonė:</label>
                                </div>
                                <div class="col-md-9 mb-9">
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" id="validationServer01" placeholder="Įveskite transporto priemonę" required>
                                    <div class="invalid-feedback">
                                        * Įveskite transporto priemonę!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">    
                                      <label for="validationServer02">Valstybinis numeris:</label>
                                </div>
                                <div class="col-md-9 mb-9">
                                    <input type="text" class="form-control" value="{{ old('number') }}" name="number" id="number" id="validationServer02" placeholder="Įveskite valstybinį numerį" required>
                                    <div class="invalid-feedback">
                                        * Įveskite valstybinį numerį!
                                    </div>
                                </div>
                            </div>

                            <h2>Kuro normos:</h2>
                            <div class="row justify-content-center">
                                <div class="col-md-4">                                    
                                    <div class="form-group">
                                      <label for="validationServer03"></label>
                                      <input type="number"
                                        class="form-control" value="{{ old('stop') }}" name="stop" id="stop" id="validationServer03" aria-describedby="helpId" placeholder="Stovėjimo kuro norma" required>
                                      <small id="helpId" class="form-text text-muted">* Stovėjimo Kuro norma l/h</small>
                                      <div class="invalid-feedback">
                                        * Įveskite stovėjimo kuro normą!
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="validationServer04"></label>
                                      <input type="number"
                                        class="form-control" value="{{ old('drive') }}" name="drive" id="drive" id="validationServer04" aria-describedby="helpId" placeholder="Važiavimo kuro norma" required>
                                      <small id="helpId" class="form-text text-muted">* Važiavimo Kuro norma l/h</small>
                                      <div class="invalid-feedback">
                                        * Įveskite važiavimo kuro normą!
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="validationServer05"></label>
                                      <input type="number"
                                        class="form-control" value="{{ old('unload') }}" name="unload" id="unload" id="validationServer05" aria-describedby="helpId" placeholder="Iškrovimo kuro norma" required>
                                      <small id="helpId" class="form-text text-muted">* Iškrovimo Kuro norma l/h</small>
                                      <div class="invalid-feedback">
                                        * Įveskite iškrovimo kuro normą!
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Patvirtinti</button>
                        </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection