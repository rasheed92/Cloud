<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
@if (auth()->user()->role=="admin")
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <p class="navbar-brand" >Welcome {{auth()->user()->name}}</p>
      </div>


      <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
<br>
<hr>
                  <li>
                      <a href="/profile/{{auth()->user()->id}}"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                  </li>


              </ul>
          </div>
          <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
  </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Registered Users
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Size</th>
                                  <th scope="col">Upload At</th>
                                      <th scope="col">Upload By</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($files as $file)


                                <tr>
                                  <td>{{$file->id}}</td>
                                  <td>{{$file->name}}</td>
                                  <td>{{$file->size}}</td>
                                  <td>{{$file->created_at->diffForHumans()}}</td>
                                  <td>{{$file->user->name}}</td>
                                    <td><a href="{{route('storage', ['file'=>urlencode($file->file)])}}"><img src="/img/download.png"  alt="..." class="rounded"></td>
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
{{ $files->links() }}
                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Registered Users
                                    <table class="table">
                                      <thead class="thead-dark">
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Pakeage</th>
                                              <th scope="col">Profile</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($users as $user)


                                        <tr>
                                          <th scope="row">{{$user->id}}</th>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->email}}</td>
                                          <td>{{$user->pakeage}}</td>
                                            <td><a  href="/profile/{{$user->id}}" name="button">Profile</a></td>
                                        </tr>
            @endforeach
                                      </tbody>
                                    </table>

                                </div>

                                <!-- /.panel-body -->
                            </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-8 -->

                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
  @else
    <h1 class="text-danger">oops something went wrong</h1>
  @endif
    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
