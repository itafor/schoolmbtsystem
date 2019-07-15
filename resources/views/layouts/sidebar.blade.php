<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="/img/logo.png" alt="Laravel Starter" class="brand-image img-circle elevation-3"
   style="opacity: .8">
<span class="brand-text font-weight-light">CHILICHAO ACADEMY</span>
</a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           @if(auth::user()->photo !=null)
             <div class="image">
                <img src="/upload/{{auth::user()->photo}}" class="img-circle elevation-4" alt="User Image">
            </div>
            @else
             <div class="image">
                <img src="/img/profile.png" class="img-circle elevation-4" alt="User Image">
            </div>
           @endif
            <div class="info">
                <a href="#" class="d-block"> {{auth()->user()->firstName!=null ? auth()->user()->firstName: "Administrator"}} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
                <li class="nav-item">
                    <a href="/dashboard/home" class="nav-link">
               <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                 Dashboard
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                <p>
                  Add / Create
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add-students" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Add student</p>
                  </a>
                        </li>

                       <li class="nav-item">
                            <a href="/add-teacher" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Add teaching Staff</p>
                  </a>
                        </li>

                           <li class="nav-item">
                            <a href="/add-admin" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Create Admin</p>
                  </a>
                        </li>
                        <li class="nav-item">
                            <a href="/add-class" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Add class</p>
                  </a>
                        </li>
                <li class="nav-item">
                            <a href="/show-term" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Add Term</p>
                  </a>
                        </li>
              <li class="nav-item">
                            <a href="/add-subject" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Add Subject</p>
                  </a>
                        </li>
                         <li class="nav-item">
                            <a href="/add-session" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Add Session</p>
                  </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                <i class="nav-icon fa fa-tree"></i>
                <p>
                 Results
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/enter-result" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Enter result</p>
                  </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Icons</p>
                  </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/buttons.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Buttons</p>
                  </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/sliders.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Sliders</p>
                  </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                <i class="nav-icon  fa fa-google-wallet"></i>
                <p>
                 Payment
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Make payment</p>
                  </a>
                        </li>
                        <li class="nav-item">
                            <a href="/view-payment-history" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Payment histories</p>
                  </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Editors</p>
                  </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                 Settings
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/fee-settings" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Fees amount setting</p>
                  </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>General Settings</p>
                  </a>
                        </li>
                    </ul>
                </li>
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>