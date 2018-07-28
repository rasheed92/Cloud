@extends('layouts.master')

@section('content')
<div class="row">


<table class="table table-striped table-dark  table-hover">
  <thead>
    <tr>
      <th scope="col">File Name</th>
      <th scope="col">File Size</th>
      <th scope="col">Upload At </th>
      <th scope="col">View File</th>
      <th scope="col">Download File</th>
    </tr>
  </thead>
  <tbody>
            @foreach ($files as $file)
    <tr>

      <th scope="row">{{$file->name}}</th>
      <td>{{$file->size}}</td>
      <td>{{$file->created_at->diffForHumans()}}</td>
      <td><a href="{{route('storage', ['file'=>urlencode($file->file)])}}"><img src="/img/download.png"  alt="..." class="rounded"></td>
<td>        <form class= "was-validated" method="get" action="/get-file">
      <div class="form-row align-items-center">
 <input type="text" class="form-control" name="like" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$file->file}}" hidden>
        <div class="col-auto">
          <button  type="submit" class="btn btn-info">Download</button>
        </div>
      </div>
      </form></td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal">
  Upload New File
</button>
<button href="{{ route('logout') }}"
    onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
    Logout
</button>

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
      <label for="exampleFormControlInput1">File Name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
    </div>
    <div class="form-group">
<label for="exampleInputFile">File input</label>
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
@endsection
