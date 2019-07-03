@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Students List</h5>

                <div class="card-tools">
                   <a href="/add-students">  <button class="btn btn-sm btn-primary">Add Student</button></a>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Add Student</a>
                      <a href="#" class="dropdown-item">Add Staff</a>
                      <a href="#" class="dropdown-item">Add Admin</a>
                      <a class="dropdown-divider"></a>
                       <form action="{{route('importExcel')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="select_file" type="file" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">
    <i class="fa fa-upload"></i>
  </button>
            </div>
        </div>
    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  offset-0">
                 <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">
    <i class="fa fa-search"></i>
  </button>
            </div>
        </div>
    </form>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Full Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Class</th>
      <th scope="col">Reg. No</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($students) >=1)
    <tr>
      <?php $id=1?>
@foreach($students as $student)
      <th scope="row">{{$id}}</th>
      <td>
      {{$student->firstName}}
      {{$student->lastName}}
    </td>
      <td>{{$student->gender}}</td>
      <td>{{$student->studentClass}}</td>
      <td>{{$student->studentRegNumber}}</td>
  <td>
  <a href=""><button class="btn btn-success"><i class="fa fa-eye"></i></button></a>
  <a href=""><button class="btn btn-info"><i class="fa fa-edit "></i></button></a>
  <a href=""><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
  <a href=""><button class="btn btn-primary"><i class="fa fa-money"></i></button></a>
  <a href=""><button class="btn btn-warning">Result</button></a>
</td>
    </tr> 
   <?php $id++ ?>
    @endforeach
   @else
     <tr>
   <td>
   <h5>
     No student found
   </h5>
   @endif
   </td>
    </tr>
  </tbody>
</table>
               
               
              </div>
              <!-- ./card-body -->
                         </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
      
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('javascript')
<!-- jQuery -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="/dist/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- Slimscroll -->
<script src="/dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="/dist/plugins/chartjs-old/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
@stop