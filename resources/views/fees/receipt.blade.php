@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$displayReceipt->firstName}}'s payment history <a href=""></a> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment receipt</li>
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
                <h5 class="card-title">Payment receipt </h5>

                <div class="card-tools">
                  <button onclick="printContent('paymentHistory')" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> Print payment receipt</button>
                 
                </div>
              </div>
              <!-- /.card-header -->
  <div class="paymentHistory" id="paymentHistory"> 
       <div class="col-md-12 paymentHistoryContainer" id="paymentHistoryContainer">         


<div class="card-body  offset-0" id="receiptContainer">
  <div class="letterHeading">
    
  <div class="row">
    <div class="col schoolName">
   <h5> <strong style="font-family: 'Fira Sans', sans-serif;">CHILICHAO ACADEMY</strong> </h5>
    </div>
  </div>
  <div class="row">
    <div class="col pobox">
   <strong> P.O. BOX 40, NSANJE</strong>
    </div>
  </div>
   <div class="row">
    <div class="col schollPhones">
    <strong> CELL: 888 19 44 67/0 999 27 14 28</strong>
    </div>
  </div>
     <div class="row">
      <div class="col-md-8 float-left">
        <span id="cashNo"><strong> Cash receipt No:</strong></span>  <strong>{{$displayReceipt->receiptNo}}</strong> 
    </div>
    <div class="col-md-4  float-right">
    <strong> Date:  <span style="text-decoration: underline;">{{Carbon\Carbon::parse($displayReceipt->datePaid)->format('m/d/Y')}}</span> </strong>
    </div>
  
  </div>
</div>
 <div class="row" style="margin-top: 10px;">
    <div class="col-md-6">
    Received from : {{$displayReceipt->receivedFrom}}
    </div>
    <div class="col-md-6">
    Student : {{$displayReceipt->firstName}} {{$displayReceipt->lastName}}
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col">
    The sum of: …………………………… <strong>{{$displayReceipt->amountPaid}} MWK</strong> ……………………………
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col">
    In words: ………………………………………………………………………………………
    </div>
  </div>
   <div class="row" style="margin-top: 10px;">
    <div class="col">
    In payment of: Registration <input class="ck_box" type="checkbox" name="registration" value="{{$displayReceipt->item ==='Registration' ? 'Registration' : ''}}" id="{{$displayReceipt->item ==='Registration' ? 'registration' : ''}}">

     School Fees<input class="ck_box" type="checkbox" name="schoolFees" value="{{$displayReceipt->item ==='School fees' ? 'School fees' : ''}}" id="{{$displayReceipt->item ==='School fees' ? 'Schoolfees' : ''}}" > 

     Library fees<input class="ck_box" type="checkbox" name="library" value="{{$displayReceipt->item ==='Library fees' ? 'library fees' : ''}}" id="{{$displayReceipt->item ==='Library fees' ? 'libraryFeel' : ''}}"> 


     Others<input class="ck_box" type="checkbox" name="others" value="{{$displayReceipt->item ==='Others' ? 'Others' : ''}}" id="{{$displayReceipt->item ==='Others' ? 'others' : ''}}">
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col">
    Balance: ………………………… <strong>{{$displayReceipt->balance}} MWK</strong>……………………………
    </div>
  </div>
    <div class="row" style="margin-top: 10px;">
    <div class="col-6">
     <strong>Received By: {{$displayReceipt->receivedBy}} </strong>
    </div>
    <div class="col-6">
   <strong> Signature:</strong>……………………………
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-12" style="text-align: center;">
      "U tra Educationem"
    </div>
  </div>
 </div>

 </div>
 </div>
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
  <script type="text/javascript">

    var schoolfees = document.getElementById("Schoolfees");
    var registration =  document.getElementById("registration");
    var libraryFeel =  document.getElementById("libraryFeel")
    var others = document.getElementById("others");

    if(schoolfees !==null){
      schoolfees.checked = true;
    }else if(registration !==null){
      registration.checked = true;
    }else if(libraryFeel !==null){
      libraryFeel.checked=true;
    }else if(others !==null){
      others.checked=true;
    }


  </script>
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