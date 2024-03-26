<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->

        @php

        $status=Auth::user()->status;

        @endphp
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>


                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Menu</li>
                @if($status == 'active')

                <li>
                    <a href="#sidebarCategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCategory">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.category')}}">All Category</a>
                            </li>
                            <li>
                                <a href="{{route('add.category')}}">Add Category</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSubCategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Sub Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSubCategory">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.subcategory')}}">All Sub Category</a>
                            </li>
                            <li>
                                <a href="{{route('add.subcategory')}}">Add Sub Category</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarNewsPost" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>News Posts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarNewsPost">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.newsposts')}}">All News Posts</a>
                            </li>
                            <li>
                                <a href="{{route('add.newspost')}}">Add News Post</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarBanner" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Banners</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBanner">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.banners')}}">All Banners</a>
                            </li>
                            <li>
                                <a href="{{route('add.banner')}}">Add New Banner</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Setting</li>

                <li>
                    <a href="#sidebarManageUsers" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Manage Admins </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarManageUsers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.admins')}}">All Admins</a>
                            </li>
                            <li>
                                <a href="{{route('add.admin')}}">Add Admin</a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">Components</li>



                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i class="mdi mdi-bullseye"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="icons-material-symbols.html">Material Symbols Icons</a>
                            </li>

                        </ul>
                    </div>
                </li>



                @else

                @endif

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
