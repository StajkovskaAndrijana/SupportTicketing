<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{URL::asset('img/logo.png')}}" alt="SupportTicketing Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Support Ticketing</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{URL::asset('img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (Auth::user()->hasRole('admin'))
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="/users" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>All Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/roles" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/permissions" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">TICKETS MANAGEMENT</li>

                    <li class="nav-item">
                        <a href="/category" class="nav-link">
                            <i class="fas fa-list-alt nav-icon"></i> <p>Categories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/priority" class="nav-link">
                            <i class="fas fa-th nav-icon"></i> <p>Priorities</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/status" class="nav-link">
                            <i class="fas fa-cogs nav-icon"></i> <p>Statuses</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/type" class="nav-link">
                            <i class="fas fa-file nav-icon"></i> <p>Types</p>
                        </a>
                    </li>

                    <li class="nav-item" style="border-bottom: 1px solid #4b545c;">
                        <a href="/tickets" class="nav-link">
                            <i class="fas fa-ticket-alt nav-icon"></i> <p>Tickets</p>
                        </a>
                    </li>
                @else
                    <li class="nav-header">TICKETS</li>
                    <li class="nav-item" style="border-bottom: 1px solid #4b545c;">
                        <a href="/mytickets" class="nav-link">
                            <i class="fas fa-ticket-alt nav-icon"></i> <p>My Tickets</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item mt-3">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>

@section('scripts')
<script>
    /** add active class and stay opened when selected */
   var url = window.location;
   const allLinks = document.querySelectorAll('.nav-item a');
   const currentLink = [...allLinks].filter(e => {
     return e.href == url;
   });

   currentLink[0].classList.add("active")
   currentLink[0].closest(".nav-treeview").style.display="block";
   currentLink[0].closest(".has-treeview").classList.add("active");
</script>
@endsection
