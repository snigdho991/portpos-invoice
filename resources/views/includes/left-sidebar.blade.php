<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
        @if(Auth::check())
            <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Quick Menu</li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>
                
                    <li class="menu-title" key="t-apps">Order Tools</li>
                        <li>
                            <a href="{{ route('all.orders') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Orders List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('create.order') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Create Order & Invoice</span>
                            </a>
                        </li>
                
                    {{-- <li class="menu-title" key="t-apps">History Stuffs</li>
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-calendar-weekend"></i>
                                <span key="t-calendar">This Week</span>
                            </a>
                        </li>
                    
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-clock-start"></i>
                                <span key="t-calendar">This Month</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-table-clock"></i>
                                <span key="t-calendar">This Year</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-aperture"></i>
                                <span key="t-calendar">Advanced Search</span>
                            </a>
                        </li> --}}

                    <li class="menu-title" key="t-apps">Profile Tools</li>
                        
                        <li>
                            <a href="{{ url('/user/profile') }}" class="waves-effect">
                                <i class="bx bx-news"></i>
                                <span key="t-calendar">Update Credentials</span>
                            </a>
                        </li>
            </ul>
            
        @endif
        </div>
        <!-- Sidebar -->
    </div>
    
</div>