@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Term</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Result</li>
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
                <h5 class="card-title">Add new term {{$studentDetails->term}} {{$studentDetails->gender}}</h5>

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
   
              <div class="card-body col-md-12 ">
            <div class="row">
        <div class="col-md-6  pull-left">
 <img class="card-img-top" src="/upload/{{$studentDetails->photo == '' && $studentDetails->gender =='Female' ? 'female.png':$studentDetails->photo == '' && $studentDetails->gender =='Male' ?'male.png' : $studentDetails->photo}}" style="width: 50px; height: 50px; border-radius: 100%;"> <span>{{$studentDetails->term}}  {{$studentDetails->lastName}}</span>
</div>
<div class="col-md-4 pull-right">

     </div>   
     </div>   
     <hr>
      <form action="{{route('studentsRank')}}" method="POST"  enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="col-lg-6 col-sm-6">
        <div class="form-group">
<table>
  <tr>
    <th>total</th>
    <th>Rank</th>
    <th>Reg. No</th>
    <th>Session</th>
    <th>term</th>
    <th>class</th>
  </tr>

  @foreach($score_board_list as $rank)
<tr>
  <td>
<input type="text" name="totalMark[]" class="form-control totalMark" readonly="readonly" value=" {{$rank->total}}">
  </td>
  <td>
<input type="text" name="rank[]" class="form-control rank" readonly="readonly" value="  {{$rank->rank}}">
  </td>
  <td>
<input type="text" name="studentRegNumber[]" class="form-control studentRegNumber" readonly="readonly" value="  {{$rank->studentRegNumber}}">
  </td>
  <td>
    <input type="text" name="sessionName[]" class="form-control sessionName" readonly="readonly" value="{{$rank->session}}">
  </td>
  <td>
     <input type="text" name="term[]" class="form-control term" readonly="readonly" value="{{$rank->term}}">
  </td>
  <td>
      <input type="text" name="studentclass[]" class="form-control studentclass" readonly="readonly" value=" {{$rank->studentclass}}">
  </td>
</tr>
@endforeach
</table>
 <div class="col-md-3 my-3">
        <button class="btn btn-primary btn-lg btn-block" type="submit"> Submit </button>
      </div>

      </div>
</div>
</form>
     <hr>

             <table class="table table-bordered table-stripped" >
              <tr>
               <thead>
                 <th>SUBJECT</th>
                 <th>MARK</th>
                 <th>POSITION</th>
                 <th>GRADE</th>
                 <th>TEACHER'S REMARK</th>
                 <th>TEACHER'S SIGNATURE</th>
               </thead>
             </tr>
           
             <tbody>
              @foreach($fetchResults as $result)
               <tr>
                 <td>{{$result->subject}}</td>
                 <td>{{$result->totalmark}}</td>
                 <td>1</td>
                 <td>{{$result->points}}</td>
                 <td>{{$result->remark}}</td>
                 <td></td>
               </tr>
               @endforeach
             </tbody>
               </table>


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