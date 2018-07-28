@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h4 class="mt-5 text-success">Please Enter Your Information Below</h4>

    </div>
  </div>
    <div class="row">

        <div class="card col border-info" style="width: 18rem;">
            <div class="panel panel-default">
              <br>
              <h5 class="card-title">Register</h5>
<hr>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col control-label">Name</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col control-label">E-Mail Address</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col control-label">Password</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col control-label">Confirm Password</label>

                            <div class="col">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <!-- <button type="submit" class="btn btn-success">
                                    Register
                                </button> -->
                            </div>
                        </div>

                </div>

            </div>
        </div>
        <div class="card border-danger  col ">
  <h3 class="card-header">Free </h3>
  <div class="card-body">

  </div>
  <p>
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center"> <h3 class="text-danger">20 GB</h3></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><h3 class="text-danger">Free</h3></li>
    </ul>


  </p>
  <div class="card-body">
  </div>


  <div class="card-footer text-muted">
    <div class="form-check">
  <input class="form-check-input" type="radio" name="pakeage" id="exampleRadios1" value="Free" >
  <label class="form-check-label text-danger" for="exampleRadios1">
    Free Package
  </label>
</div>
  </div>
</div>
<div class="card border-warning  col ">
<h3 class="card-header">Standard </h3>
<div class="card-body">

</div>
<p>
  <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center"> <h3 class="text-info">50 GB</h3></li>
    <li class="list-group-item d-flex justify-content-between align-items-center"><h3 class="text-info"> 10$ / Month</h3></li>
  </ul>


</p>
<div class="card-body">

</div>

<div class="card-footer text-muted">
<div class="form-check">
<input class="form-check-input" type="radio" name="pakeage" id="exampleRadios1" value="Standard" >
<label class="form-check-label text-info" for="exampleRadios1">
Standard Package
</label>
</div>
</div>
</div>
<div class="card border-success col ">
<h3 class="card-header">Business</h3>
<div class="card-body">

</div>
<p>
  <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center"> <h3 class="text-success">100 GB</h3></li>
    <li class="list-group-item d-flex justify-content-between align-items-center"><h3 class="text-success"> 20$ / Month</h3></li>
  </ul>


</p>
<div class="card-body">
</div>

<div class="card-footer text-muted">
<div class="form-check">
<input class="form-check-input" type="radio" name="pakeage" id="exampleRadios1" value="Business" >
<label class="form-check-label text-success" for="exampleRadios1">
Business Package
</label>
</div>
</div>
</div>
    </div>
    <br>
<button type="submit" class="btn btn-success btn-lg btn-block">Register</button>
  </form>
</div>
@endsection
