<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                    href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>



            @php
                $reviewcount = Auth::user()->unreadNotifications()->count();
            @endphp

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">{{ $reviewcount }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div class="noti-scroll" data-simplebar>

                        @php
                            $user = Auth::user();
                        @endphp

                        @forelse($user->notifications as $notification)
                            <!-- item-->
                            <a href="{{ route('change.notification.status',$notification->id) }}" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="{{ $user->image ? asset($user->image) : asset('uploads/no_image.jpg') }}"
                                        class="img-fluid rounded-circle" alt="User Image" />
                                </div>
                                <p class="notify-details">{{ $notification->data['message'] }}</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Admin</small>
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                                </p>
                            </a>
                        @empty
                        @endforelse
                    </div>

                    <!-- All-->


                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ empty(Auth::user()->photo) ? asset('uploads/no_image.jpg') : asset(Auth::user()->photo) }}"
                        alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('admin.change.password') }}" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Change Password</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>


        </ul>

        @php
            $siteinfo = App\Models\SiteSetting::find(1);
        @endphp
        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{ route('admin.dashboard') }}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{ asset($siteinfo->logo) }}" alt="" height="25">

                </span>
                <span class="logo-lg">
                    <img src="{{ asset($siteinfo->logo) }}" alt="" height="25">

                </span>
            </a>

            <a href="{{ route('admin.dashboard') }}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{ asset($siteinfo->logo) }}" alt="" height="25">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset($siteinfo->logo) }}" alt="" height="25">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>


        </ul>
        <div class="clearfix"></div>
    </div>
</div>
