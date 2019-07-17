@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <div id="message"></div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Class</li>
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
                <h5 class="card-title">Fee Settings</h5>

                <div class="card-tools">
                   <button type="button" class="btn btn-tool">
                   <a href="/view-fee-settings">View fee settings</a>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  offset-1 col-md-12 ">
              <!--   <div class="row col-md-12"> -->
      <form action="{{route('setFee')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
     


        <div class="d-block my-3 col-md-6 ">
           <label for="address2">Class Name <span class="text-muted"></span></label>
         <select name="className" class="form-control" id="classTeacher">
           <option value="0">Select class </option>
           @foreach($classes as $clas)
           <option value="{{$clas->className}}">{{$clas->className}}</option>
           @endforeach
         </select>
        </div>

         <div class="d-block my-3 col-md-6 ">
           <label for="address2">Session Name <span class="text-muted"></span></label>
         <select name="sessionName" class="form-control" id="classTeacher">
           <option value="0">Select session</option>
           @foreach($sessions as $section)
           <option value="{{$section->sessionName}}">{{$section->sessionName}}</option>
           @endforeach
         </select>
        </div>

         <div class="d-block my-3 col-md-6 ">
           <label for="address2">Term <span class="text-muted"></span></label>
         <select name="term" class="form-control" id="classTeacher">
           <option value="0">Select term</option>
           @foreach($terms as $term)
           <option value="{{$term->termName}}">{{$term->termName}}</option>
           @endforeach
         </select>
        </div>
          <div class="d-block my-3 col-md-6">
           <label for="paymentiTEM">In Payment of:<span class="text-muted"></span></label>
             <select name="item" class="form-control paymentiTEM">
                  <option value="">select payment item</option>
                  <option value="Registration">Registration</option>
                  <option value="School fees">School fees</option>
                  <option value="Library fund">Library fund</option>
                  <option value="Others">Others</option>
                </select>
               </div>
           <div class="mb-3 col-md-6 ">
          <label for="address2">Total fee amount <span class="text-muted"></span></label>
          <input type="text" class="form-control" id="feeAmount" placeholder="fee amount" name="feeAmount" required="required">
        </div>

           <hr class="mb-3 col-md-6 ">
 <div class="col-md-3 my-3">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Go!</button>
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