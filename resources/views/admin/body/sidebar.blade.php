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
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> CRM </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="crm-dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="crm-contacts.html">Contacts</a>
                            </li>
                            <li>
                                <a href="crm-opportunities.html">Opportunities</a>
                            </li>
                            <li>
                                <a href="crm-leads.html">Leads</a>
                            </li>
                            <li>
                                <a href="crm-customers.html">Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Email </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li>
                                <a href="email-inbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="email-read.html">Read Email</a>
                            </li>
                            <li>
                                <a href="email-compose.html">Compose Email</a>
                            </li>
                            <li>
                                <a href="email-templates.html">Email Templates</a>
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

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-timeline.html">Timeline</a>
                            </li>
                            <li>
                                <a href="pages-sitemap.html">Sitemap</a>
                            </li>
                            <li>
                                <a href="pages-invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="pages-faqs.html">FAQs</a>
                            </li>
                            <li>
                                <a href="pages-search-results.html">Search Results</a>
                            </li>
                            <li>
                                <a href="pages-pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="pages-maintenance.html">Maintenance</a>
                            </li>
                            <li>
                                <a href="pages-coming-soon.html">Coming Soon</a>
                            </li>
                            <li>
                                <a href="pages-gallery.html">Gallery</a>
                            </li>
                            <li>
                                <a href="pages-404.html">Error 404</a>
                            </li>
                            <li>
                                <a href="pages-404-two.html">Error 404 Two</a>
                            </li>
                            <li>
                                <a href="pages-404-alt.html">Error 404-alt</a>
                            </li>
                            <li>
                                <a href="pages-500.html">Error 500</a>
                            </li>
                            <li>
                                <a href="pages-500-two.html">Error 500 Two</a>
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
                            <li>
                                <a href="icons-two-tone.html">Two Tone Icons</a>
                            </li>
                            <li>
                                <a href="icons-feather.html">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icons-mdi.html">Material Design Icons</a>
                            </li>
                            <li>
                                <a href="icons-dripicons.html">Dripicons</a>
                            </li>
                            <li>
                                <a href="icons-font-awesome.html">Font Awesome 5</a>
                            </li>
                            <li>
                                <a href="icons-themify.html">Themify</a>
                            </li>
                            <li>
                                <a href="icons-simple-line.html">Simple Line</a>
                            </li>
                            <li>
                                <a href="icons-weather.html">Weather</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i class="mdi mdi-bookmark-multiple-outline"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="forms-elements.html">General Elements</a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">Advanced</a>
                            </li>
                            <li>
                                <a href="forms-validation.html">Validation</a>
                            </li>
                            <li>
                                <a href="forms-pickers.html">Pickers</a>
                            </li>
                            <li>
                                <a href="forms-wizard.html">Wizard</a>
                            </li>
                            <li>
                                <a href="forms-masks.html">Masks</a>
                            </li>
                            <li>
                                <a href="forms-quilljs.html">Quilljs Editor</a>
                            </li>
                            <li>
                                <a href="forms-file-uploads.html">File Uploads</a>
                            </li>
                            <li>
                                <a href="forms-x-editable.html">X Editable</a>
                            </li>
                            <li>
                                <a href="forms-image-crop.html">Image Crop</a>
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
