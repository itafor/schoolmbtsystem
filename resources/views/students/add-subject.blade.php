@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add new Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Subject</li>
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
                <h5 class="card-title">Add Subject</h5>

                <div class="card-tools">
                 <a href="/all-students">  <button class="btn btn-sm btn-primary">List subjects</button></a>
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
         
              <div class="card-body  offset-0">
               
        <form action="{{route('addNewSubject')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="col-lg-12 col-sm-12">
        <div class="form-group">
          <table class="table table-bordered">
            <thead>
             
              <th>Subject Name</th>
                <th><a class="btn btn-sm btn-success addRow"><i class="fa fa-plus"></i></a></th>
            </thead>
           
            <tr>
          <td>
         <input type="text" name="subjectName[]" class="form-control subjectName" >
              </td>
            
  <td><a  class="btn btn-sm btn-danger remove"><i class="fa fa-remove"></i></a></td>
            </tr>
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
  $('.addRow').on('click',function(){
    addRow();
  });
  function addRow(){
var tr = '<tr>' +
               '<td>'+
               ' <input type="text" name="subjectName[]" class="form-control subjectName">'+
            '</td>'+
             
              '<td><a class="btn btn-sm btn-danger remove"><i class="fa fa-remove"></i></a></td>'+

'</tr>';

$('tbody').append(tr);
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