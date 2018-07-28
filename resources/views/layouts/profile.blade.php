@extends('layouts.master')

@section('content')
@if ($user->id==auth()->user()->id||auth()->user()->role=="admin")
@if ($storge >=$limit)
<div class="row">
  <div class="col-md-5 offset-md-5">
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
      <div class="card-body">
        <center>
          <h4 class="card-title">You have reached the limited storage space
</h4> </center>
        <center>
          <p class="card-text">Please delete some files or purchase another storage package
          </p>
        </center>

        <br>
        <center> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
          Upgrade storage package
        </button> </center>




      </div>



    </div>
  </div>
</div>
    @endif

<div class="row">

  <div class="col-3">


    <div class="card border-info" style="width: 17rem;">
      <div class="card-header">
        <h5 class="text-info">   Welcome {{auth()->user()->name}}</h5>
      </div>
      <ul class="list-group list-group-flush">

        <li class="list-group-item text-info">Account Type {{auth()->user()->pakeage}}</li>
        <li class="list-group-item text-info">Storge Used : {{$storge}} GB</li>
        <li class="list-group-item text-info">
          @if (auth()->user()->pakeage=="Free")

            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$a}}%"></div>
            </div>
          @elseif (auth()->user()->pakeage=="Standard")

            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$b}}%"></div>
            </div>
          @else

            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$c}}%"></div>
            </div>
          @endif



        </li>
        @if ($storge >=$limit)


        <li class="list-group-item text-danger ">
          <h5>You have reached the limited storage space</h5></li>
        @endif
        @if (auth()->user()->role=="admin")


        <li class="list-group-item text-danger ">
          <a class="btn btn-link text-success" href="/Dashboard">
          <b>Go to Dashboard</b>
          </a>
        @endif
        <li class="list-group-item">
          <button type="button" class="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </button>
        </li>
      </ul>


    </div>
  </div>
  <div class="col-9">

    <div class="card border-success">
      <table class="table table-striped table-dark  table-hover border-success">
        <thead>
          <tr>
            <th scope="col">File Name</th>
            <th scope="col">File Size</th>
            <th scope="col">Upload At </th>
            <th scope="col">View File</th>
            <th scope="col">Download File</th>
            <th scope="col">Delete File</th>
          </tr>
        </thead>
        <tbody>


          @foreach ($user->files as $file)
          <tr>

            <th scope="row">{{$file->name}}</th>

            <td> {{ number_format((int) $file->size)}} Byte </td>



            <td>{{$file->created_at->diffForHumans()}}</td>
            <td><a href="{{route('storage', ['file'=>urlencode($file->file)])}}"><img src="/img/download.png"  alt="..." class="rounded"></td>
<td>        <form class= "was-validated" method="get" action="/get-file">
      <div class="form-row align-items-center">
 <input type="text" class="form-control" name="like" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$file->file}}" hidden>
        <div class="col-auto">
          <button  type="submit" class="btn btn-success">Download</button>
        </div>
      </div>
      </form></td>
      <td>        <form class= "was-validated" method="get" action="/delete/{{$file->id}}">
            <div class="form-row align-items-center">
              <div class="col-auto">
                <button  type="submit" class="btn btn-danger">Delete</button>
              </div>
            </div>
            </form>
          </td>

    </tr>

        @endforeach


  </tbody>
</table>
  </div>
  <br>
  @if ($storge <$limit)


    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal">
         Upload New File
       </button>

  @endif

    </div>

  @else
    <br>
    <br>
    <br>
    <div class="row">

  <div class="col-md-5 offset-md-3">
<center><h1 class="text-danger">Opps  Page not fund !</h1></center>
<br>
<center><a href="/profile/{{auth()->user()->id}}" type="button" class="btn btn-success">Back to your profile</a></center>
    </div>
  </div>

  @endif
</div>

<!-- Button trigger modal -->


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>

</div>
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/add" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputFile">Choose a file from your computer</label>
            <input type="file" name="file" id="exampleInputFile">
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
      </div>
      </form>
    </div>

  </div>
</div>








<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/edit/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Pakeage</label>
            <select class="form-control" name="pakeage" id="exampleFormControlSelect1">
      @if (auth()->user()->pakeage=="Free")
        <option value="Standard">Standard</option>
        <option value="Business">Business</option>
      @elseif (auth()->user()->pakeage=="Standard")
        <option value="Business">Business</option>
      @endif

    </select>
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
