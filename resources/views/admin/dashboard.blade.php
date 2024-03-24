
@include('admin.body.header')

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            @include('admin.body.topbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->
            @include('admin.body.sidebar')
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
            <div class="content-page">
@yield('main')
            </div> <!-- container -->

        </div> <!-- content -->


                <!-- Footer Start -->
                @include('admin.body.footer')
