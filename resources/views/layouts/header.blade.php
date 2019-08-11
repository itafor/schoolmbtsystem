 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>

    </ul>
 @if(auth::user()->role =='admin')
    <!-- SEARCH FORM -->
   
 <form action="{{route('findStudent')}}" method="post" id="searchSkillForm"> 
   <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="input-group input-group-sm">
            <input name="regNo" class="form-control form-control-navbar" type="text" placeholder="Search" aria-label="Search" autocomplete="off" id="searchskill">
            <div id="skillList"></div>
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
    <i class="fa fa-search"></i>
  </button>
            </div>
        </div>
    </form>
@endif

<div id="#markAsRead-done"></div>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
         
        
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
 <!--  <i class="fa fa-comments-o"></i> -->
   
  <span class="badge badge-danger navbar-badge">
      @if(auth::user()->photo !=null)
                <img src="/upload/{{auth::user()->photo}}" class="img-circle elevation-4" alt="User Image" style="width: 30px; height: 30px;">
            @else
                <img src="/img/profile.png" class="img-circle elevation-4" alt="User Image" style="width: 30px; height: 30px;">
           @endif

  </span>
</a>
           

           <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                 @if(auth::user()->role =='admin' || auth::user()->role =='teacher')
                <a href="/my-profile" class="dropdown-item">
    <i class="fa fa-user"></i> My profile
    <span class="float-right text-muted text-sm"></span>
  </a>
  @endif

   @if(auth::user()->role =='student')
                <a href="/student-profile/{{auth::user()->id}}" class="dropdown-item">
    <i class="fa fa-user"></i> My profile
  </a>
  @endif
                <div class="dropdown-divider"></div>
    
                <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/change-pawword">
          <i class="fa fa-lock mr-2"></i> Change password
     </a>
     <a class="dropdown-item" href="{{ route('logout') }}">
          <i class="fa fa-sign-out  mr-2"></i> Logout
     </a>

                <div class="dropdown-divider"></div>

            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
       
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
  <i class="fa fa-bell-o"></i>
  <span class="badge badge-warning navbar-badge">{{auth()->user()->unReadNotifications->count()}}</span>
</a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header pull-left"> {{auth()->user()->notifications->count()}} Notifications</span>
                   
                    <a href="{{route('markas.read')}}">
                 <span class="dropdown-header pull-right">Mark all as read</span>
                  </a><br/>
                <div class="dropdown-divider"></div>
                @if(auth()->user()->unReadNotifications->count() > 0)
         <span style="" class="pull-left">New Notification</span>
         @endif
   @foreach(auth()->user()->unReadNotifications as $notification)
                <div class="dropdown-divider"> </div>
                
                <a href="/read-notifcation/{{$notification->id}}" class="dropdown-item" style="background-color: lightgray;">
    <i class="fa fa-circle-o  mr-2"></i>{{$notification->data['greeting']}}
    <span class="float-right text-muted text-sm" >{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</span>
  </a>
  @endforeach

@if(auth()->user()->ReadNotifications->count() > 0)
         <span style="margin-left:0px">Earlier Notification</span>
         @endif
       @foreach(auth()->user()->ReadNotifications as $notification)
                <div class="dropdown-divider"></div>
                <a href="/read-notifcation/{{$notification->id}}" class="dropdown-item">
    <i class="fa fa-circle-o  mr-2"></i>{{$notification->data['greeting']}}
    <span class="float-right text-muted text-sm">{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</span>
  </a>
  @endforeach
     
                <div class="dropdown-divider"></div>
<!--                 <a href="/all-notifications/" class="dropdown-item dropdown-footer">See All Notifications</a> -->

            </div>
        </li>



       <!-- Cart count -->
       
        <li class="nav-item dropdown">
            <a class="nav-link"  href="{{route('cart.index')}}">
  <i class="fa fa-shopping-cart"></i>&nbsp;
  @if(Cart::instance('default')->count() > 0)
  <span class="badge badge-warning navbar-badge">{{Cart::instance('default')->count()}}</span>
  @endif
</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->