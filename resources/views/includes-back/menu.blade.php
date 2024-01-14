<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
        <div class="sidebar-brand-text mx-3">Book Over There</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home Page</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Route::is('club.page') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <span>Club</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Route::is('club.page') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('club.page')}}">Club List</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    @if(Auth::check())
        <hr class="sidebar-divider">
        <li class="nav-item {{ Route::is('user.profile') || Route::is('order.get.list') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <span>User</span>
            </a>
            <div id="collapseUtilities" class="collapse {{ Route::is('user.profile') || Route::is('order.get.list') ? 'show' : '' }}" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Route::is('user.profile') ? 'active' : '' }}" href="{{route('user.profile')}}">My profile</a>
                    <a class="collapse-item {{ Route::is('order.get.list') ? 'active' : '' }}" href="{{ route("order.get.list", ['user_id' => Auth::id()]) }}">Book History</a>
                </div>
            </div>
        </li>
        @if(Auth::user()->is_staff===1)
            <hr class="sidebar-divider">
            <li class="nav-item {{ Route::is('report.page') || Route::is('member.get.list') || Route::is('book.get.list') || Route::is('book.calendar') || Route::is('order.get.list.control') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                   aria-expanded="true" aria-controls="collapsePages">
                    <span>Club Staff</span>
                </a>
                <div id="collapsePages" class="collapse {{ Route::is('report.page') || Route::is('member.get.list') || Route::is('book.get.list') || Route::is('book.calendar') || Route::is('order.get.list.control') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('report.page') ? 'active' : '' }}" href="{{route('report.page')}}">Report</a>
                        <a class="collapse-item {{ Route::is('member.get.list') ? 'active' : '' }}" href="{{route('member.get.list')}}">Club Member</a>
                        <a class="collapse-item {{ Route::is('book.get.list') ? 'active' : '' }}" href="{{route('book.get.list')}}">Book</a>
                        <a class="collapse-item {{ Route::is('book.calendar') ? 'active' : '' }}" href="{{route('book.calendar')}}">Book Borrow Calendar</a>
                        <a class="collapse-item {{ Route::is('order.get.list.control') ? 'active' : '' }}" href="{{route('order.get.list.control')}}">Order</a>
                    </div>
                </div>
            </li>
        @endif
    @endif



</ul>
<!-- End of Sidebar -->
