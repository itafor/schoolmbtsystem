@extends('layouts.master')

@section('content')
<style type="text/css">
 /* Glyph, by Harry Roberts */

hr{
    overflow: visible; /* For IE */
    padding: 0;
    border: none;
    border-top: medium double #333;
    color: #333;
    text-align: center;
    margin: -20px 0px 5px 0px;
}
hr:after {
    content: "§";
    display: inline-block;
    position: relative;
    top: -0.7em;
    font-size: 1.5em;
    padding: 0 0.25em;
    background: white;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Result</h1>
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
                <h5 class="card-title">{{$studentDetails->firstName}} {{$studentDetails->term}}'s result</h5>

                <div class="card-tools">
                  <button onclick="printContent('theResult')" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> Print result</button>
                   <button type="button" class="btn btn-tool">
                   <a href="/all-students">List students</a>
                  </button>
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
   
              <div class="card-body col-md-12 theResult" id="theResult">
 
      <form action="{{route('studentsRank')}}" method="POST"  novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="col-lg-6 col-sm-6">
        <div class="form-group">
<table>
  @foreach($score_board_list as $rank)
<tr>
  <td>
<input type="hidden" name="totalMark[]" class="form-control totalMark" readonly="readonly" value=" {{$rank->total}}">
  </td>
  <td>
<input type="hidden" name="rank[]" class="form-control rank" readonly="readonly" value="  {{$rank->rank}}">
  </td>
   <td>
<input type="hidden" name="points[]" class="form-control points" readonly="readonly" value="  {{$rank->points}}">
  </td>
  
  <td>
<input type="hidden" name="studentRegNumber[]" class="form-control studentRegNumber" value="  {{$rank->studentRegNumber}}">
  </td>
  <td>
    <input type="hidden" name="sessionName[]" class="form-control sessionName" readonly="readonly" value="{{$rank->session}}">
  </td>
  <td>
     <input type="hidden" name="term[]" class="form-control term" readonly="readonly" value="{{$rank->term}}">
  </td>
  <td>
      <input type="hidden" name="studentclass[]" class="form-control studentclass" readonly="readonly" value=" {{$rank->studentclass}}">
  </td>
</tr>
@endforeach
</table>
@if(isset($position) || !isset($position))
 <div class="col-md-6">
        <button class="btn btn-sm  " type="submit"> <span  style="color: red;"> Update</span> {{$studentDetails->firstName}}  {{$studentDetails->lastName}}'s position in class  </button>
      </div>
@endif
      </div>
</div>
</form>
<div class="studentResultDetailContainer" id="studentResultDetailContainer">

  <div class="letterHeading">
  <div class="row">
    <div class="col schoolName">
   <h3> <strong>CHILICHAO ACADEMY</strong> </h3>
    </div>
  </div>
  <div class="row">
    <div class="col pobox">
   <strong> P.O. BOX 40, NSANJE</strong>
    </div>
  </div>
   <div class="row">
    <div class="col schoolEmails">
    <strong>itaforfrancis@gmail.com</strong>
    </div>
  </div>
   <div class="row">
    <div class="col schollPhones">
    <strong>TEL: 01 456 604; CELL: 0 999 23 18 52/0 888 19 44 67/0 999 27 14 28</strong>
    </div>
  </div>
</div>
 <!-- <hr> -->
 <div>
  <div class="row">
    <div class="col-6">
      <strong class="progresReport">
        PROGRESS REPORT
  </strong>
    </div>
    @if($studentDetails->photo)
    <div class="col-6 resultsudentPix">
        <img class="card-img-top" src="/upload/{{$studentDetails->photo == '' && $studentDetails->gender =='Female' ? 'female.png':$studentDetails->photo == '' && $studentDetails->gender =='Male' ?'male.png' : $studentDetails->photo}}" id="stdResultImage"> 
    </div>
  </div>

    @endif
     <div class="row" id="studentResultDetail">
      <div class="col-6">
      <strong>NAME: <span>{{$studentDetails->firstName}}  {{$studentDetails->lastName}}</strong>
    </div>
     <div class="col-6">
      <strong>GENDER: <span>{{$studentDetails->gender}}</strong>
    </div>
     <div class="col-6">
      <strong>
      CLASS: <span>{{$studentDetails->studentclass}}</span>
  </strong>
    </div>
    <div class="col-6">
      <strong>
    TERM: <span>{{$studentDetails->term}}</span>
  </strong>
    </div>
    
     <div class="col-6">
      <strong>
      Session: <span>{{$studentDetails->session}}</span>
  </strong>
    </div>
    <div class="col-6">
      <strong>
      REG.NO.: <span>{{$studentDetails->studentRegNumber}}</span>
  </strong>
    </div>
  </div>
</div>
   
             <table  border="1" id="reportTable">
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
           
             <tbody style="font-weight: bold;">
              @foreach($fetchResults as $result)
               <tr>
                 <td>{{$result->subject}}</td>
                 <td>{{$result->totalmark}}</td>
                 <td>{{$result->position}}</td>
                 <td>{{$result->points}}</td>
                 <td>{{$result->remark}}</td>
                 <td></td>
               </tr>
               @endforeach
             </tbody>
               </table>

 @if(isset($position))
@endif
<div style="margin-top: 20px;">
  <div class="row">
    <div class="col-6">
     <strong>STUDENT’S AGGREGATE: 
     @if(isset($position)) 
      {{$position->points}}
      @endif
    </strong>
    </div>
    <div class="col-3">
   <strong>POSITION:
@if(isset($position)) 
    {{$position->rank}}</strong>
    @endif
    </div>
    <div class="col-3">
  <strong>OUT OF:  {{$numberOfStudent}}</strong>
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-3">
     <strong>CLASS: {{$studentDetails->studentclass}} </strong>
    </div>
    <div class="col-3">
   <strong>TEACHER’S</strong>
    </div>
    <div class="col-4">
  <strong>COMMENTS: </strong>
    </div>
  </div>

  <div class="row" style="margin-top: 10px;">
    <div class="col">
    ………………………………………………
    </div>
    <div class="col">
    ………………………………………………
    </div>
  </div>

   <div class="row" style="margin-top: 10px;">
    <div class="col">
   <strong>HEADTEACHER’S</strong>
    </div>
    <div class="col">
  <strong>COMMENTS: </strong>
    </div>
  </div>

  <div class="row" style="margin-top: 10px;">
    <div class="col">
    …………………………………………………………
   
    </div>
    <div class="col">
    …………………………………………………………
   
       </div>
  </div>
   <div class="row" style="margin-top: 10px;">
    <div class="col-10">
 <strong>KEY:   1 = 75 – 100; 2 = 70 – 74;  3 = 65– 69; 4 = 60 – 64; 5 = 55 –59 ; 6 = 50 – 54; 7 = 45 – 49; 8 = 40 – 44;
9 = 0-39 
1 – 2 DISTINCTION; 3 – 6 CREDIT; 7 – 8 PASS; 9 FAIL
</strong>
    </div>
    
  </div>
</div>
 </div>  

<!--  end of  result container -->

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