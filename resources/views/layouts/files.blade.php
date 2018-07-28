@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


                  @foreach ($files as $file)

<h1>{{$file->id}}</h1>
<h1>{{$file->name}}</h1>
<h1>{{$file->user->name}}</h1>
<h1>{{$file->sum('size')}}</h1>

</div>
<div class="card" style="width: 18rem;">
<img class="card-img-top img-fluid" src="{{route('storage', ['file'=>urlencode($file->file)])}}" alt="">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>



@endforeach

<object width="400" height="400" data="http://127.0.0.1:8000/storage?file=uploads%252FNztgc4Xr6U3x96pAwdwmyCMLau8aOPbjQNIzrzR3.txt"></object>



                <!-- <form>
                <div class="form-group">
          <label for="exampleFormControlFile1">Example file input</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

      </form> -->
                <!-- <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
            </div>
        </div>



                <form action="/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
            <div class="form-group">
              <label for="exampleFormControlInput1">name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
            </div>
            <div class="form-group">
       <label for="exampleInputFile">File input</label>
       <input type="file" name="file" id="exampleInputFile">
       <p class="help-block">Example block-level help text here.</p>
       </div>
            <div class="row justify-content-md-center">
                    <button type="submit" class="btn btn-success">Add to Cart</button>
        </div>
          </form>













    </div>
</div>
@endsection
