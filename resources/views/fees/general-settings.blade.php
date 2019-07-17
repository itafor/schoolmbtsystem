@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">General settings <a href=""></a> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Settings</li>
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
                <h5 class="card-title">General Settings </h5>

                <div class="card-tools">
                   <button type="button" class="btn btn-tool">
                   <a href="/fee-settings">add settings</a>
                  </button>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  offset-0" style="background: white;">
                 <!-- SEARCH FORM -->
@if(isset($fetchSettings))
     <form action="{{route('generalSetting')}}" method="POST" enctype="multipart/form-data" novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">School Name</label>
    <div class="col-sm-10">
      <input type="text" name="schoolName" class="form-control" id="schoolName" placeholder="School Name" value="{{$fetchSettings->schoolName}}">
    </div>
  </div>

<div class="form-group row">
    <label for="pob" class="col-sm-2 col-form-label">P.O.BOX Address</label>
    <div class="col-sm-10">
      <input type="text" name="pob" class="form-control" id="pob" placeholder="P.O.BOX address" value="{{$fetchSettings->pob}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email Address</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Email" value="{{$fetchSettings->email}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="tel" class="col-sm-2 col-form-label">Tel.</label>
    <div class="col-sm-10">
      <input type="text" name="telephone" class="form-control" id="tel" placeholder="Telephone" value="{{$fetchSettings->telephone}}">
    </div>
  </div>
    <div class="form-group row">
    <label for="cellPhone" class="col-sm-2 col-form-label">Cell Phone</label>
    <div class="col-sm-10">
      <input type="text" name="cellPhone" class="form-control" id="cellPhone" placeholder="Cell Phone" value="{{$fetchSettings->cellPhone}}">
    </div>
  </div>
     <div class="form-group row">
    <label for="schoolAddress" class="col-sm-2 col-form-label">School Address</label>
    <div class="col-sm-10">
      <textarea name="schoolAddress" class="form-control" id="schoolAddress" placeholder="School Address">{{$fetchSettings->schoolAddress}}</textarea>
    </div>
  </div>
   <div class="form-group row">
    <label for="cellPhone" class="col-sm-2 col-form-label">School Logo</label>
    <div class="col-sm-10">
      <input type="file" name="schoolLogo" class="form-control" id="schoolLogo" value="{{$fetchSettings->schoolLogo}}">
      <img class="card-img-top" src="/upload/{{$fetchSettings->schoolLogo}}" style="width: 100px; height: 100px; border-radius: 100%;">
    </div>
  </div>
 <!--  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            First radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Second radio
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
          <label class="form-check-label" for="gridRadios3">
            Third disabled radio
          </label>
        </div>
      </div>
    </div>
  </fieldset> -->
<!--   <div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Example checkbox
        </label>
      </div>
    </div>
  </div> -->
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
          @endif     
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