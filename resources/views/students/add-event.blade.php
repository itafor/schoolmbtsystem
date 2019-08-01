@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Notification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Notification</li>
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
                <h5 class="card-title">Add new notification</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                
                  <!--  <a href="/terms">  <button class="btn btn-sm btn-primary">List terms</button></a> -->
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  offset-1 col-md-12 ">
              <!--   <div class="row col-md-12"> -->
      <form action="{{route('notification.send')}}" method="POST"  novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="mb-3 col-md-6 ">
          <label for="address2">Subject <span class="text-muted"></span></label>
          <input type="text" class="form-control" id="eventSubject" placeholder="Term" name="eventSubject" required="required">
        </div>
        <div class="mb-3 col-md-6 ">
          <label for="address2">Notification Content <span class="text-muted"></span></label>
          <textarea class="form-control" id="eventBody" placeholder="Write something" name="eventBody" required="required"></textarea> 
        </div>
           <hr class="mb-3 col-md-6 ">
 <div class="col-md-3 my-3">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
      </div>
      </form>
                </div>
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