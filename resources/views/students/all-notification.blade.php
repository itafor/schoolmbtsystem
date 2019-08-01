@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Term</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Term</li>
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
               
                <h5 class="card-title"> {{$notification->data['greeting']}}</h5>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body col-md-12 ">
       <span class="dropdown-header pull-left"> {{auth()->user()->notifications->count()}} Notifications</span>
                   
                    <a href="{{route('markas.read')}}">
                 <span class="dropdown-header pull-right">Mark all as read</span>
                  </a><br/>
                <div class="dropdown-divider"></div>
                @if(auth()->user()->unReadNotifications->count() > 0)
         <span style="" class="pull-left">Unread</span>
         @endif
   @foreach(auth()->user()->unReadNotifications as $notification)
                <div class="dropdown-divider"> </div>
                
                <a href="/read-notifcation/{{$notification->id}}" class="dropdown-item" style="background-color: lightgray;">
    <i class="fa fa-circle-o  mr-2"></i>{{$notification->data['greeting']}}
    <span class="float-right text-muted text-sm" >{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</span>
  </a>
  @endforeach

@if(auth()->user()->ReadNotifications->count() > 0)
         <span style="margin-left:0px">read</span>
         @endif
       @foreach(auth()->user()->ReadNotifications as $notification)
                <div class="dropdown-divider"></div>
                <a href="/read-notifcation/{{$notification->id}}" class="dropdown-item">
    <i class="fa fa-circle-o  mr-2"></i>{{$notification->data['greeting']}}
    <span class="pull-right text-muted text-sm">{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</span>

   
  </a>
   <span class="float-right text-muted text-sm">
      <a href="/delete-notification/{{$notification->id}}">
                    <i class="fa fa-remove"></i>
        </a>
    </span>
  @endforeach
     
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