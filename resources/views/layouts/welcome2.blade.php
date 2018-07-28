@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
            <center>    <h1 class="mt-5 text-success">Login Successful ! </h1>        </center>
    <br>






      </div>
            <div class=" col-md-4 offset-md-4" style="width: 18rem;">
              <div class="card">
                <div class="card-header">
        <center><h3 class="text-info">Welcome back</h3>        </center>
                </div>
                <div class="card-body">
                      <center>    <h5 class="card-title"> {{auth()->user()->name}}</h5>        </center>
                      <br>
                <center>  <a href="profile/{{auth()->user()->id}}" class="btn btn-success">Go To Profile </a>  </center>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
