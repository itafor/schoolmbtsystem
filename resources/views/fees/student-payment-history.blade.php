@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fee settings <a href=""></a> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fee Settings</li>
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
                <h5 class="card-title">Fee Settings </h5>

                <div class="card-tools">
                   <button type="button" class="btn btn-tool">
                   <a href="/fee-settings">add settings</a>
                  </button>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  offset-0" style="background: white;">
                 <!-- SEARCH FORM -->

        <table class="table table-responsive table-bordered">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Class</th>
      <th scope="col">Session</th>
      <th scope="col">Term</th>
      <th scope="col">Expected Amt</th>
      <th scope="col">Amount paid</th>
      <th scope="col">Payment Item</th>
      <th scope="col">Balance</th>
      <th scope="col">Status</th>
      <th scope="col">Date Paid</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($studentPaymentHistories) >=1)
    <tr>
      <?php $id=1?>
@foreach($studentPaymentHistories as $history)
      <td>{{$id}}</td>
      <td>{{$history->className}}</td>
      <td>{{$history->sessionName}}</td>
      <td>{{$history->term}}</td>
      <td>{{$history->feeAmount}}</td>
      <td>{{$history->amountPaid}}</td>
      <td>{{$history->item}}</td>
      <td>{{$history->balance}}</td>
      <td>{{$history->status}}</td>
      <td>{{$history->datePaid}}</td>
  <td colspan="">
  <a href=""><button class="btn btn-info"><i class="fa fa-eye "></i></button></a>
</td>
    </tr> 
   <?php $id++ ?>
    @endforeach

   @else
     <tr>
   <td colspan="12">
   <h5>
     Nothing found
   </h5>
   @endif
   </td>
    </tr>
    <tr  rowspan="10">
     <td>
        <span class="pagination">{{$studentPaymentHistories->links()}}</span>
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