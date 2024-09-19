<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> 
        <a href="{{ url('dashboard') }}" class="brand-link"> <!--begin::Brand Image--> 
            <img src="{{ asset('storage/users-avatar/avatar.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> 
            <span class="brand-text fw-light">{{ config('app.name') }}</span> <!--end::Brand Text--> 
        </a> <!--end::Brand Link--> 
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> 
                    <a href="{{ url('dashboard') }}" class="nav-link"> 
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(Auth::user()->user_type === 'Admin')
                <li class="nav-item">
                    <a href="#" class="nav-link"> 
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Manage Teachers
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="{{ route('verified.teachers') }}" class="nav-link"> 
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Verified Teachers</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ route('unverified.teachers') }}" class="nav-link"> 
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Unverified Teachers</p>
                            </a> 
                        </li>
                    </ul>
                </li>
                @endif
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->