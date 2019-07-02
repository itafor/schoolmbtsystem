@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add new student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Student</li>
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
                <h5 class="card-title">Add Student</h5>

                <div class="card-tools">
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
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  offset-1">
               
        <form action="{{route('addNewstudent')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" value="" >
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

 <div class="row">
        <div class="col-md-6 mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
          <label for="password">Password</label>
          <input type="text" name="password" class="form-control" id="password" placeholder="1234 Main St">
          <div class="invalid-feedback">
            Please enter your password.
          </div>
        </div>
         <div class="col-md-6 mb-3">
          <label for="address2">Registration Number <span class="text-muted"></span></label>
          <input type="text" name="studentRegNumber" class="form-control" id="regNumber" placeholder="Registration Number">
        </div>
</div>

<div class="row">
    <div class="col-md-6 d-block my-3">
          <label for="address">Gender</label>
         <select name="gender" class="form-control">
           <option value="0">Select Gender</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
         </select>
        </div>

         <div class="col-md-6 d-block my-3">
          <label for="address">Class</label>
         <select name="studentClass" class="form-control">
           <option value="0">Select Student Class</option>
           @if(count($classes) >=1)
           @foreach($classes as $class)
           <option value="{{$class->className}}">{{$class->className}}</option>
           @endforeach
           @endif
         </select>
        </div>
</div>

       
        <div class="row">
           <div class="col-md-6 mb-3">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" >
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

          <div class="col-md-6 mb-3">
            <label for="cc-name">Date of Birth</label>
            <input type="date" class="form-control" id="cc-name" placeholder="" name="birthday">
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
         
       

        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-expiration">Photo</label>
            <input type="file" name="photo" class="form-control" id="cc-expiration">
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-cvv">Phone Number <span class="text-muted">(Optional)</span></label>
            <input type="text" name="phoneNo" class="form-control" id="cc-cvv" placeholder="" >
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
        <button class="btn btn-primary btn-lg btn-block" type="submit"> Submit</button>
      </div>
      </form>
               
                <!-- /.row -->
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