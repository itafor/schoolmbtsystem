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
    <span> Search students here  <i class="fa fa-arrow-circle-right"></i>  </span>
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

     <a class="dropdown-item" href="{{ route('logout') }}">
          <i class="fa fa-lock mr-2"></i> Logout
     </a>
                <div class="dropdown-divider"></div>

            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
       
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
  <i class="fa fa-bell-o"></i>
  <span class="badge badge-warning navbar-badge">15</span>
</a>
          <!--   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
       
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
    <i class="fa fa-users mr-2"></i> 8 friend requests
    <span class="float-right text-muted text-sm">12 hours</span>
  </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
    <i class="fa fa-file mr-2"></i> 3 new reports
    <span class="float-right text-muted text-sm">2 days</span>
  </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div> -->
        </li>

    </ul>
</nav>
<!-- /.navbar -->