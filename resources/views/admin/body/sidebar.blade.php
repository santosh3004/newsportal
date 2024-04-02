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

                @if (Auth::user()->can('category.menu'))


                <li>
                    <a href="#sidebarCategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCategory">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('category.list'))
                            <li>
                                <a href="{{route('all.category')}}">All Category</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('category.add'))
                            <li>
                                <a href="{{route('add.category')}}">Add Category</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                 @endif


                 @if(Auth::user()->can('subcategory.menu'))
                <li>
                    <a href="#sidebarSubCategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Sub Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSubCategory">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('subcategory.list'))
                            <li>
                                <a href="{{route('all.subcategory')}}">All Sub Category</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('subcategory.add'))
                            <li>
                                <a href="{{route('add.subcategory')}}">Add Sub Category</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif


                @if(Auth::user()->can('news.menu'))
                <li>
                    <a href="#sidebarNewsPost" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>News Posts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarNewsPost">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('news.list'))
                            <li>
                                <a href="{{route('all.newsposts')}}">All News Posts</a>
                            </li>
                            @endif
                     @if(Auth::user()->can('news.add'))
                            <li>
                                <a href="{{route('add.newspost')}}">Add News Post</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif


                @if(Auth::user()->can('banner.menu'))
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

                        </ul>
                    </div>
                </li>
                @endif





                @if(Auth::user()->can('photo.menu'))
                <li class="menu-title mt-2">Gallery</li>
                <li>
                    <a href="#sidebarManagePhotos" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Manage Photo Gallery </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarManagePhotos">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.photos')}}">Photo Gallery</a>
                            </li>
                            <li>
                                <a href="{{route('add.photos')}}">Add Photos</a>
                            </li>

                        </ul>
                    </div>
                </li>

                @endif


 @if(Auth::user()->can('video.menu'))

                <li>
                    <a href="#sidebarManageVideos" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Manage Video Gallery </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarManageVideos">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.videos')}}">Video Galllery</a>
                            </li>
                            <li>
                                <a href="{{route('add.video')}}">Add Video</a>
                            </li>

                        </ul>
                    </div>
                </li>

                @endif


 @if(Auth::user()->can('live.menu'))


                <li>
                    <a href="#sidebarManageLiveTVDetails" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Manage Live Tv  Details</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarManageLiveTVDetails">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('edit.live')}}">Edit Live TV Details</a>
                            </li>


                        </ul>
                    </div>
                </li>
                @endif


                @if(Auth::user()->can('review.menu'))
                <li>
                    <a href="#sidebarManageReviews" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Manage Reviews</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarManageReviews">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.reviews')}}">Reviews</a>
                            </li>
                            <li>
                                <a href="{{route('pending.reviews')}}">Pending Reviews</a>
                            </li>


                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('setting.menu'))

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

                @if(Auth::user()->can('seo.menu'))
                <li>
                    <a href="#seo" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Seo Details </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="seo">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('seo.details') }}">Seo Details</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('role.menu'))
                <li>
                    <a href="#sidebarManageRolesAndPermissions" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Manage Roles & Permissions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarManageRolesAndPermissions">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.permissions')}}">All Permissions</a>
                            </li>

                            <li>
                                <a href="{{route('all.roles')}}">All Roles</a>
                            </li>

                            <li>
                                <a href="{{route('assign.permission')}}">Assign Permissions</a>
                            </li>

                            <li>
                                <a href="{{route('all.assignedpermissions')}}">All Assigned Permissions</a>
                            </li>


                        </ul>
                    </div>
                </li>
                @endif





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
                @endif

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
