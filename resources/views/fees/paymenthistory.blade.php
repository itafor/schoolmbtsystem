@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
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
                <h5 class="card-title">{{$sudentdetail->firstName}} {{$sudentdetail->lastName}}'s Fee Payment</h5>

                <div class="card-tools">
                   <button type="button" class="btn btn-tool">
                   <a href="/view-student-payment-histories/{{$sudentdetail->id}} ">View <span style="color: gray" id="stdName">{{$sudentdetail->firstName}}</span> payment history</a>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  col-md-12 ">
             <span id="message"></span>
    <form action="{{route('storePamyent')}}" method="POST"  enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="col-lg-12 col-sm-12">
        <div class="form-group">
          <table class="table table-bordered">
            <div class="row">
               <div class="d-block my-3 col-md-4">
           <label for="address2">Class Name <span class="text-muted"></span></label>
         <select name="className" class="form-control feeclassName" id="feeclassName">
           <option value="">Select class </option>
           <option value="{{$sudentdetail->studentClass}}">{{$sudentdetail->studentClass}}</option>
         </select>
             </div> 
               <div class="d-block my-3 col-md-4">
           <label for="address2">Session Name <span class="text-muted"></span></label>
         <select name="sessionName" class="form-control feesessionName" id="feesessionName">
           <option value="">Select session</option>
           @foreach($sessions as $section)
           <option value="{{$section->sessionName}}">{{$section->sessionName}}</option>
           @endforeach
         </select>
         </div>
               <div class="d-block my-3 col-md-4 ">
           <label for="address2">Term Name <span class="text-muted"></span></label>
          <select name="term" class="form-control feeterm" id="feeterm">
           <option value="">Select term</option>
           @foreach($terms as $term)
           <option value="{{$term->termName}}">{{$term->termName}}</option>
           @endforeach
         </select>
              </div>
  </div>
              <div class="row">
               <div class="d-block my-3 col-md-4 ">
           <label for="address2">Expected Total Fee<span class="text-muted"></span></label>
                <input type="text" name="feeAmount" class="form-control feeAmount" id="feeAmount" readonly="readonly">
                </div>

                <div class="d-block my-3 col-md-4 ">
           <label for="address2">Amount Paid By Student<span class="text-muted"></span></label>
                <input type="number" name="amountPaid" class="form-control amountPaid" id="amountPaid" >
                </div>

                <div class="d-block my-3 col-md-4 ">
           <label for="address2">Balance<span class="text-muted"></span></label>
                <input type="text" name="balance" class="form-control balance" readonly="readonly" >

                </div>
              </div>


               <div class="row">
               <div class="d-block my-3 col-md-4 ">
           <label for="paymentiTEM">In Payment of:<span class="text-muted"></span></label>
             <select name="item" class="form-control paymentiTEM">
                  <option value="">select payment item</option>
                  <option value="Registration">Registration</option>
                  <option value="School fees">School fees</option>
                  <option value="Library fund">Library fund</option>
                  <option value="Others">Others</option>
                </select>
               </div>


                <div class="d-block my-3 col-md-4 ">
           <label for="address2">Status<span class="text-muted"></span></label>
                <input type="text" name="feestatus" class="form-control feestatus" readonly="readonly" >

               </div>


                <div class="d-block my-3 col-md-4 ">
           <label for="address2">User ID<span class="text-muted"></span></label>
                   <input type="text" name="user_id" class="form-control user_id" value="{{$sudentdetail->id}}" id="user_id" readonly="readonly">
               </div>
             </div>
              <div class="row" id="otherItemDiv">
                <div class="d-block col-md-4 ">
           <label for="address2">Specify Payment Item<span class="text-muted"></span></label>
                <input type="text" name="otherItem" class="form-control otherItem">
               </div>
              </div>
                     <div class="row">


                <div class="d-block my-3 col-md-6 ">
           <label for="address2">Received from<span class="text-muted"></span></label>
                <input type="text" name="receivedFrom" class="form-control receivedFrom" >

               </div>


                <div class="d-block my-3 col-md-6 ">
           <label for="address2">Received By<span class="text-muted"></span></label>
                   <input type="text" name="receivedBy" class="form-control receivedBy" >
               </div>
             </div>        
               
              
            </tr>
            
          </table>
        </div>
         
       </div>
       
        <div class="col-md-3 my-3">
        <button class="btn btn-primary btn-sm btn-block submitBtn" id="submitBtn" type="submit"> Submit</button>
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