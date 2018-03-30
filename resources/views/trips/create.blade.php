@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header"><span class="display-4">Įveskite kelionės duomenis</span><button onclick='location.href="{{url('/home')}}"' type="button" class="btn btn-info float-right">Pradinis</button></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                      @include('layouts.errors')
                
                        <h4>Automobilis: {{ $auto->name }} Valst.nr.: {{ $auto->number }}</h4><br>
                        <form class="needs-validation" novalidate action="{{ url('/trips', $auto->id) }}" method="post">                 
                                {{ csrf_field() }}     
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">Kelionės data:</label>
                                </div>
                                <div class="col-md-10 mb-9">
                                    <input type="date" class="form-control" name="date" id="validationServer01" placeholder="Įveskite datą" value="" required>
                                    <div class="invalid-feedback">
                                        Pasirinkite datą!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                  <label for="validationServer02">Maršrutas:</label>
                                </div>
                                <div class="col-md-10 mb-9">
                                  <input type="text" class="form-control" name="route" id="validationServer02" placeholder="Įveskite kelionės maršrutą" value="" required>
                                  <div class="invalid-feedback">
                                    Įveskite kelionės maršrutą!
                                  </div>
                                </div>
                            </div>

                            <div class="form-row">
                              <div class="col-md-2 mb-3">
                                <label for="validationCustom03">Išvyko iš terminalo:</label>
                              </div>
                              <div class="col-md-10 mb-9">
                                <input type="time" class="form-control" name="timeStart" id="validationCustom03" placeholder="Įveskite išvykimo iš terminalo laiką" required>
                                <div class="invalid-feedback">
                                  Įveskite išvykimo iš terminalo laiką!
                                </div>
                              </div>
                            </div> 

                            <div class="form-row">
                              <div class="col-md-2 mb-3">
                                <label for="validationCustom04">Atvyko pas klientą:</label>
                              </div>
                              <div class="col-md-10 mb-9">
                                <input type="time" class="form-control" name="timeToCustomer" id="validationCustom04" placeholder="Įveskite laiką" required>
                                <div class="invalid-feedback">
                                  Įveskite atvykimo pas klientą laiką!
                                </div>
                              </div>
                            </div> 

                            <div class="form-row">
                              <div class="col-md-2 mb-3">
                                <label for="validationCustom05">Iškrovimo laikas, min:</label>
                              </div>
                              <div class="col-md-10 mb-9">
                                <input type="number" class="form-control" name="timeunload" id="validationCustom05" placeholder="Įveskite iškrovimo laiką minutėmis" required>
                                <div class="invalid-feedback">
                                  Įveskite iškrovimo laiką minutėmis!
                                </div>
                              </div>
                            </div> 

                            <div class="form-row">
                              <div class="col-md-2 mb-3">
                                <label for="validationCustom06">Išvyko iš Kliento:</label>
                              </div>
                              <div class="col-md-10 mb-9">
                                <input type="time" class="form-control" name="timeFromCustomer" id="validationCustom06" placeholder="Įveskite laiką" required>
                                <div class="invalid-feedback">
                                  Įveskite išvykimo iš kliento laiką!
                                </div>
                              </div>
                            </div> 

                            <div class="form-row">
                              <div class="col-md-2 mb-3">
                                <label for="validationCustom07">Atvyko į terminalą:</label>
                              </div>
                              <div class="col-md-10 mb-9">
                                <input type="time" class="form-control" name="timeEnd" id="validationCustom07" placeholder="Įveskite laiką" required>
                                <div class="invalid-feedback">
                                  Įveskite atvykimo į terminalą laiką!
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-row">
                              <div class="col-md-2 mb-3">
                                <label for="validationCustom08">Spidometro parodymai:</label>
                              </div>
                              <div class="col-md-10 mb-9">
                                <input type="number" class="form-control" name="spidometerStart" id="validationCustom08" placeholder="Įveskite Spidometro parodymus išvykstant" required>
                                <div class="invalid-feedback">
                                  Įveskite Spidometro parodymus išvykstant!
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-row">
                              <div class="col-md-2 mb-3">
                                <label for="validationCustom09">Spidometro parodymai:</label>
                              </div>
                              <div class="col-md-10 mb-9">
                                <input type="number" class="form-control" name="spidometerEnd" id="validationCustom09" placeholder="Įveskite Spidometro parodymus grįžus" required>
                                <div class="invalid-feedback">
                                  Įveskite Spidometro parodymus grįžus!
                                </div>
                              </div>
                            </div>
                                                                                     
                      <button class="btn btn-primary" type="submit">Patvirtinti</button>
                    </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection