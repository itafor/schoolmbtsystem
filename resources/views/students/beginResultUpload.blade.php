@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add new student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Student</li>
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
                <h5 class="card-title">Add Student</h5>

                <div class="card-tools">
                 <a href="/all-students">  <button class="btn btn-sm btn-primary">List Students</button></a>
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
               
        <form action="{{route('saveResult')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="col-lg-12 col-sm-12">
        <div class="form-group">
          <tbody>
    @if(count($students) >=1)
    <tr>
      <?php $id=1?>
@foreach($students as $student)
      <th scope="row">{{$id}}</th>
      <td>
      {{$student->firstName}}
    </td>
    <td>
      {{$student->lastName}}
    </td>
      <td>{{$student->gender}}</td>
      <td>{{$student->studentClass}}</td>
      <td>{{$student->studentRegNumber}}</td>
  <td>
  <a href=""><button class="btn btn-success"><i class="fa fa-eye"></i></button></a>
  <a href=""><button class="btn btn-info"><i class="fa fa-edit "></i></button></a>
  <a href=""><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
  <a href=""><button class="btn btn-primary"><i class="fa fa-money"></i></button></a>
  <a href=""><button class="btn btn-warning">Result</button></a>
</td>

<td>
  <a href=""><button class="btn btn-success"><i class="fa fa-eye"></i></button></a>
  <a href=""><button class="btn btn-info"><i class="fa fa-edit "></i></button></a>
  <a href=""><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
  <a href=""><button class="btn btn-primary"><i class="fa fa-money"></i></button></a>
  <a href=""><button class="btn btn-warning">Result</button></a>
</td>
    </tr> 
   <?php $id++ ?>
    @endforeach

   @else
     <tr>
   <td>
   <h5>
     No student found
   </h5>
   @endif
   </td>
    </tr>
    <tr >
     <td colspan="10"  rowspan="10">
        <span class="pagination">{{$students->links()}}</span>
     </td>
   </tr>
          
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

<!--   
  public function action(Request $request)
    {
 
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('role','student')
         ->orWhere('studentRegNumber', 'like', '%'.$query.'%')
         ->orWhere('studentClass', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('users')
         ->where('role','student')
         ->paginate(3);
         //return view('students.list-students',compact(['students']));
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $student)
       {
        $output .= '
        <tr>
         <td>'.$student->firstName.'</td>
         <td>'.$student->lastName.'</td>
         <td>'.$student->gender.'</td>
         <td>'.$student->studentClass.'</td>
         <td>'.$student->studentRegNumber.'</td>

         <td>
  <a href=""><button class="btn btn-success"><i class="fa fa-eye"></i></button></a>
  <a href=""><button class="btn btn-info"><i class="fa fa-edit "></i></button></a>
  <a href=""><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
  <a href=""><button class="btn btn-primary"><i class="fa fa-money"></i></button></a>
  <a href=""><button class="btn btn-warning">Result</button></a>
</td>
        </tr>
        ';

       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
      // 'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    } -->

@endsection

@section('javascript')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<!-- <script type="text/javascript">
  $('.addRow').on('click',function(){
    addRow();
  });
  function addRow(){
var tr = '<tr>' +
       '<td>' +
            '<select name="studentClass" id="studentClass" class="form-control studentClass">'+
           '<option value="0">Select Student Class</option>'+
           '@if(count($classes) >=1)'+
          '@foreach($classes as $class)'+
          '<option value="{{$class->className}}">{{$class->className}}</option>'+
           '@endforeach'+
           '@endif'+
         '</select>'+
              '</td>'+
             '<td>'+
         '<select name="fullName" class="form-control fullName" id="fullName">'+
          
       '</select>'+
            '  </td>'+
               '<td>'+
          '<select name="studentRegNumber" class="form-control" id="studentRegNumber">'+
          ' <option value=""></option>'+
         '</select>'+
             ' </td>'+
              '<td>'+
                '<input type="number" name="testscore[]" class="form-control">'+
             ' </td>'+
              ' <td>'+
               ' <input type="number" name="examscore[]" class="form-control">'+
              '</td>'+
              '<td>'+
                '<input type="number" name="points[]" class="form-control">'+
              '</td>'+
              ' <td>'+
                '<input type="text" name="remark[]" class="form-control">'+
             '</td>'+
             '<td>'+
'                <input type="text" name="Subject[]" class="form-control">'+
              '</td>'+
               '<td>'+
               ' <input type="text" name="session[]" class="form-control">'+
            '</td>'+
               '<td>'+
                '<select name="term" id="term" class="form-control">'+
           '<option value="0">Select term</option>'+
           '@if(count($terms) >=1)'+
           '@foreach($terms as $term)'+
           '<option value="{{$term->termName}}">{{$term->termName}}</option>'+
          ' @endforeach'+
          ' @endif'+
        ' </select>'+
             ' </td>'+
              '<td><a class="btn btn-sm btn-danger remove"><i class="fa fa-remove"></i></a></td>'+

'</tr>';

$('tbody').append(tr);
  }

</script> -->



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