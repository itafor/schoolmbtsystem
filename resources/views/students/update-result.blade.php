@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Result</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upload result</li>
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
                <h5 class="card-title">Update Result</h5>

                <div class="card-tools">
                 <a href="/all-students">  <button class="btn btn-sm btn-primary">List Students</button></a>
                 
        <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-upload"></i> Excel
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Add Admin</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">
                        <form action="{{route('importResult')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="result_file" type="file" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">
    <i class="fa fa-upload"></i>
  </button>
            </div>
        </div>
    </form>

                      </a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
              
                </div>
              </div>
              <!-- /.card-header -->
     <form action="{{route('editResultsFormData')}}" method="POST" name="initCheckResult" onsubmit="return validateForm()">
       <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="row ctss">

              <div class="col-md-3 mb-3">
            <select name="studentClass" class="form-control studentClass">
             @if(isset($theClass))
                 <option value="{{$theClass}}">{{$theClass}}</option>
                @else
           <option value=" ">Select Class</option>
              @endif
           @if(count($classes) >=1)
           @foreach($classes as $class)
           <option value="{{$class->className}}">{{$class->className}}</option>
           @endforeach
           @endif
         </select>
          </div>



              <div class="col-md-2 mb-3">
              <select name="term" id="term" class="form-control theTerm" id="theTerm">
           @if(isset($theTerm))
                 <option value="{{$theTerm}}">{{$theTerm}}</option>
                @else
           <option value=" ">Select Term</option>
              @endif
           @if(count($terms) >=1)
           @foreach($terms as $term)
           <option value="{{$term->termName}}">{{$term->termName}}</option>
           @endforeach
           @endif
         </select>
          </div>

           <div class="col-md-2 mb-3">
              <select name="sessionName" id="term" class="form-control theSssionName">
                @if(isset($theSession))
                 <option value="{{$theSession}}">{{$theSession}}</option>
                @else
           <option value=" ">Select session</option>
              @endif
           @if(count($sessions) >=1)
           @foreach($sessions as $session)
           <option value="{{$session->sessionName}}">{{$session->sessionName}}</option>
           @endforeach
           @endif
         </select>
          </div>

<div class="col-md-3">
              <select name="subjectName" id="term" class="form-control theSubjectName">
             @if(isset($theSubject))
                 <option value="{{$theSubject}}">{{$theSubject}}</option>
                @else
           <option value=" ">Select Subject</option>
              @endif
           @if(count($subjects) >=1)
           @foreach($subjects as $sub)
           <option value="{{$sub->subjectName}}">{{$sub->subjectName}}</option>
           @endforeach
           @endif
         </select>
          </div>

                  <div class="col-sm-2 mb-3">
        <input class="btn btn-info btn-sm" type="submit" value="Submit" id="submitSubject">
      </div>
              </div>

       
</form>

              <div class="card-body  offset-0">
               
        <form action="{{route('saveEditedResult')}}" method="POST"  enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="col-lg-12 col-sm-12">
        <div class="form-group">
          <table class="table table-bordered">
            <thead>
             
             <!--  <th>Class</th> -->
              <th>Name</th>
             <!--  <th>ID</th> -->
              <th>Reg. Number</th>
              <th>Test score</th>
              <th>Exam score</th>
              <th>Total Mark</th>
              <th>Points</th>
              <th>Position</th>
              <!-- <th>Remark</th> -->
              <!-- <th>Subject</th>
              <th>Session</th>
              <th>Term</th> -->
           
            </thead>
          
             @if(isset($getRelatedResult) >=1)
           @foreach($getRelatedResult as $resultDate)
            <tr>
             
            <input type="hidden" name="studentClass[]" class="form-control studentClass" value="{{$resultDate->studentclass}}">

 <td>
            <input type="text" name="studentName[]" class="form-control studentClass" value="{{$resultDate->firstName}} {{$resultDate->lastName}}">
</td>
             <!--  <td> -->
          <input type="hidden" name="studentId[]" class="form-control fullName" value="{{$resultDate->user_id}}">
                    <!-- </td> -->
               <td>
         <input type="text" name="studentRegNumber[]" class="form-control" readonly="readonly" value="{{$resultDate->studentRegNumber}}">
          
              </td>
              <td>
                <input type="text" name="testscore[]" class="form-control testscore" value="{{$resultDate->testscore}}">
              </td>
               <td>
                <input type="text" name="examscore[]" class="form-control examscore" id="examscore" value="{{$resultDate->examscore}}">
              </td>
                <td>
                <input type="text" name="totalmark[]" class="form-control totalmark" id="totalmark"  value="{{$resultDate->totalmark}}">
              </td>
               <td>
                <input type="text" name="points[]" class="form-control points" value="{{$resultDate->points}}">
              </td>
               <td>
                <input type="text" name="position[]" class="form-control position" value="{{$resultDate->position}}" >
              </td>
             <!--   <td> -->
                <input type="hidden" name="remark[]" class="form-control remark" value="{{$resultDate->remark}}">
             <!--  </td> -->
            
                 <!-- <td> -->
                <input type="hidden" name="subject[]" class="form-control" value="{{$resultDate->subject}}">
               <!--  </td> -->
            
               <!--  <td> -->
                <input type="hidden" name="session[]" class="form-control" value="{{$resultDate->session}}">
                 <!-- </td> -->
          
        <!--  <td> -->
    <input type="hidden" name="term[]" id="term" class="form-control" value="{{$resultDate->term}}">
       <!--   </td> -->
          
            
            </tr>
             @endforeach
             @else
             <tr>
               <td colspan="8"><h1>NO student found</h1></td>
             </tr>
           @endif
          </table>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript">
  function validateForm() {
  var x = document.forms["initCheckResult"]["sessionName"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>
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