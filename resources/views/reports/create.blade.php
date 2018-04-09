@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <span class="h2">Vartotojo ataskaitos</span>
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
                        <form class="needs-validation" novalidate action="{{ url('/reports') }}" method="post">                 
                                {{ csrf_field() }}     
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">Data:</label>
                                </div>
                                <div class="col-md-10 mb-9">
                                    <input type="month" class="form-control" value="{{ old('month') }}" name="month" id="validationServer01" placeholder="Įveskite datą" value="" required>
                                    <div class="invalid-feedback">
                                        Pasirinkite datą!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer02">Vartotojas:</label>
                                </div>
                                <div class="col-md-10 mb-9">
                                    <select class="form-control" value="{{ old('user') }}" name="user" id="validationServer02">
                                        <option selected>Pasirinkite vartotoją</option>
                                        @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

{{--                              <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">Automobilis:</label>
                                </div>
                                <div class="col-md-10 mb-9">
                                    <select class="form-control">
                                        <option>Pasirinkite automobilį</option>
                                        @foreach ($autos as $auto)
                                            <option>{{ $auto->name . " " . $auto->number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  --}}

                            <button class="btn btn-info" type="submit">Patvirtinti</button>
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