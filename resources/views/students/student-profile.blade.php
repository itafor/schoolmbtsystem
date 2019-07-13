@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(isset($student))
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
              <h5 class="m-0 text-dark">{{$student->firstName}} {{$student->lastName}}'s Profile
               
              </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$student->firstName}}</li>
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
                 @if(isset($student))
                <h5 class="card-title">{{$student->firstName}} {{$student->lastName}}'s Profile
                </h5>
        @endif
                <div class="card-tools">
                
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
              <div class="card-body col-md-12 ">
           <div class="row">
        <div class="col-md-6  pull-left">
 <img class="card-img-top" src="/upload/{{$student->photo == '' && $student->gender =='Female' ? 'female.png':$student->photo == '' && $student->gender =='Male' ?'male.png' : $student->photo}}" style="width: 50px; height: 50px; border-radius: 100%;"> <span>{{$student->firstName}} {{$student->lastName}}</span>
</div>
<div class="col-md-4 pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#editStudentPixModal" style="margin-top: 5px;">
 <i class="fa fa-pencil"></i> change picture
</button>
     </div>   
     </div>   
     <hr>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
                         </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">

                    <table>
                      <tbody>
                         <tr>
                          <td colspan="2">  

                            <img class="card-img-top" src="/upload/{{$student->photo == '' && $student->gender =='Female' ? 'female.png':$student->photo == '' && $student->gender =='Male' ?'male.png' : $student->photo}}" style="width: 100px; height: 100px; border-radius: 100%;">

<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#editStudentProfileModal" style="margin-top: 5px;margin-left: 50px;">
 <i class="fa fa-pencil"></i> Update profile
</button>


                          </td>
                        </tr>
                        <tr>
                          <td>  <h3 class="studentDeatilTitle">First Name:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->firstName}}</span></td>
                        </tr>
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Last Name:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->lastName}}</span></td>
                        </tr>
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Reg. Number:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->studentRegNumber}}</span></td>
                        </tr>
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Class:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->studentClass}}</span></td>
                        </tr>
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Username:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->username}}</span></td>
                        </tr>
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Gender:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->gender}}</span></td>
                        </tr>
                        @if($student->email)
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Email:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->email}}</span></td>
                        </tr>
                        @endif
                         @if($student->phoneNo)
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Phone:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->phoneNo}}</span></td>
                        </tr>
                        @endif
                         <tr>
                          <td>  <h3 class="studentDeatilTitle">Birthday:</h3></td>
                          <td>  <span class="studentDeatil">{{$student->birthday}}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Check Result</strong>
                    </p>
 <form action="{{route('checkStudentResult')}}" method="GET" name="initCheckResult" onsubmit="return validateForm()">
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <input type="hidden" name="studentRegNumber" value="{{$student->studentRegNumber}}"  class="form-control">
                    <div class="form-group">
                      <input type="hidden" name="studentClass" class="form-control studentClass" value="{{$student->studentClass}}">
                    </div>
                    <!-- /.progress-group -->

                    <div class="form-group">
                      <select name="term" id="term" class="form-control">
           <option value=" ">Select term</option>
           @if(count($terms) >=1)
           @foreach($terms as $term)
           <option value="{{$term->termName}}">{{$term->termName}}</option>
           @endforeach
           @endif
         </select>
                    </div>

                    <!-- /.progress-group -->
                    <div class="form-group">
                       <select name="sessionName" id="term" class="form-control sessionName">
           <option value=" ">Select session</option>
           @if(count($sessions) >=1)
           @foreach($sessions as $session)
           <option value="{{$session->sessionName}}">{{$session->sessionName}}</option>
           @endforeach
           @endif
         </select>
                    </div>

              <div class="col-sm-2 mb-3">
        <input class="btn btn-info btn-sm" type="submit" value="Submit">
      </div>

                    <!-- /.progress-group -->
                  </form>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fa fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fa fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        </div>
     

        <!-- /.row -->

        <!-- Main row -->
      
        <!-- /.row -->
      </div><!--/. container-fluid -->


<!-- Button trigger modal -->


<!--edit picture Modal -->
<div class="modal fade" id="editStudentPixModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeProfilePix">Change Student Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  action="{{route('editStudentProfilePix')}}" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="id" value="{{$student->id}}">
   <div class="input-group mb-3 col-md-6">
      <input type="file" class="form-control" name="studentProfileImage" >
      <div class="input-group-append">
  <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </div>

</form>
      </div>
    
    </div>
  </div>
</div>

<!--edit profile Modal -->
<div class="modal fade" id="editStudentProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeProfilePix">Edit Student Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('updateStudentProfile')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name </label>
            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" value="{{$student->firstName}}" >
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name </label>
            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" value="{{$student->lastName}}" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

 <div class="row">
        <div class="col-md-6 mb-3">
          <label for="username">Username </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{$student->username}}" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="{{$student->email}}">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
</div>
<div class="row">
   <div class="col-md-6 mb-3">
            <label for="cc-cvv">Phone Number</label>
            <input type="text" name="phoneNo" class="form-control" id="cc-cvv"  value="{{$student->phoneNo}}">
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
         <div class="col-md-6 mb-3">
          <label for="address2">Registration Number  <span style="color: red;">*</span></label>
          <input type="text" name="studentRegNumber" class="form-control" id="regNumber"  value="{{$student->studentRegNumber}}">
        </div>
</div>

<div class="row">
    <div class="col-md-6 d-block my-3">
          <label for="address">Gender  <span style="color: red;">*</span></label>
         <select name="gender" class="form-control">
           <option  value="{{$student->gender}}">{{$student->gender}}</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
         </select>
        </div>

         <div class="col-md-6 d-block my-3">
          <label for="address">Class  <span style="color: red;">*</span></label>
         <select name="studentClass" class="form-control">
           <option value="{{$student->studentClass}}">{{$student->studentClass}}</option>
           @if(count($classes) >=1)
           @foreach($classes as $class)
           <option value="{{$class->className}}">{{$class->className}}</option>
           @endforeach
           @endif
         </select>
        </div>
</div>

       
        <div class="row">
           <div class="col-md-6 mb-3">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" id="address" value="{{$student->address}}" >
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

          <div class="col-md-6 mb-3">
            <label for="cc-name">Date of Birth  <span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="birthday" value="{{$student->birthday}}">
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
         
       

        </div>
       
        <div class="col-md-3 my-3">
        <button class="btn btn-primary btn-lg btn-block" type="submit"> Submit</button>
      </div>
      </form>
      </div>
    
    </div>
  </div>
</div>
@else
<h3>The selected user is not a student</h3>
 @endif
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