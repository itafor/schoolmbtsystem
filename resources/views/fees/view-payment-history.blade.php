@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> payment history <a href=""></a> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment history</li>
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
                <h5 class="card-title">Payment history </h5>

                <div class="card-tools">
                  <button onclick="printContent('paymentHistory')" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> Print payment history</button>
                  <a  href="/student-profile/">  <button class="btn btn-sm btn-primary"> Back to </button></a>

                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle btn-info text-dark" data-toggle="dropdown">
                      Show payment history by class
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                       <a href="/view-payment-history" class="dropdown-item">All Students</a>
                      @foreach($classes as $form)
                      <a href="/view-payment-history/{{$form->className}}" class="dropdown-item">{{$form->className}}</a>
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="paymentHistory" id="paymentHistory"> 
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
<div class="card-body  offset-0" style="background: white;">
  @if(isset($theClass))
<div class="row col-sm-6" style="text-align: center; margin:-40px 200px 10px 300px;font-weight:bold; text-transform: uppercase; font-family: 'TIMES NEW ROMANS'"> {{$theClass->className}}'s Payment History </div>
          @endif      

 @if(isset($allClasses))
<div class="row col-sm-6" style="text-align: center; margin:-40px 200px 10px 300px;font-weight:bold; text-transform: uppercase; font-family: 'TIMES NEW ROMANS'"> {{$allClasses}}'s Payment History </div>
          @endif

        <table class="table table-responsive table-hover">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Full name</th>
      <th scope="col">Class</th>
      <th scope="col">Session</th>
      <th scope="col">Term</th>
      <th scope="col">Expected Amount</th>
      <th scope="col">Amount paid</th>
      <th scope="col">Payment Item</th>
      <th scope="col">Balance</th>
      <th scope="col">Status</th>
      <th scope="col">Date Paid</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php $id=1?>
     @if(isset($generalpaymentHistory))
    @if(count($generalpaymentHistory) >=1)
    <tr>
@foreach($generalpaymentHistory as $history)
      <td>{{$id}}</td>
      <td><a href="/student-profile/{{$history->user_id}}">{{$history->firstName}} {{$history->lastName}}</a></td>
      <td>{{$history->className}}</td>
      <td>{{$history->sessionName}}</td>
      <td>{{$history->term}}</td>
      <td>{{$history->feeAmount}}</td>
      <td>{{$history->amountPaid}}</td>
      <td>{{$history->item}}</td>
      <td>{{$history->balance}}</td>
      <td>{{$history->status}}</td>
      <td>{{Carbon\Carbon::parse($history->datePaid)->format('m/d/Y')}}</td>
  <td>
  <a href="/payment-receipt/{{$history->id}}"><button class="btn btn-info"><i class="fa fa-eye "></i></button></a>
</td>
    </tr> 
   <?php $id++ ?>
    @endforeach

   @else
     <tr>
   <td colspan="11">
   <h5>
     Nothing found
   </h5>
   @endif
   </td>
    </tr>
      <tr  rowspan="10">
     <td>
        <span class="pagination">{{$generalpaymentHistory->links()}}</span>
     </td>
   </tr>
  </tbody>
 @endif
</table>
               
               
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