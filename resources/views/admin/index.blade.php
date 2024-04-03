@extends('admin.dashboard')
@section('main')
    @php

        $status = Auth::user()->status;
        $activenews = App\Models\NewsPost::where('status', 1)->get();
        $inactivenews = App\Models\NewsPost::where('status', 0)->get();
        $breakingnews = App\Models\NewsPost::where('breaking_news', 1)->get();
    @endphp

    <!-- start page title -->
    @if ($status == 'active')
        <h4>Admin Account Is <span class="text-success">Active </span> </h4>
    @else
        <h4>Admin Account Is <span class="text-danger">InActive </span> </h4>
        <p class="text-danger"><b>Plz wait admin will check and approve your account</b></p>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                <i class="fe-heart font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">{{ count($allnews) }}</h3>
                                <p class="text-muted mb-1 text-truncate">All News Post</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                <i class="fe-thumbs-up font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">{{ count($activenews) }}</h3>
                                <p class="text-muted mb-1 text-truncate">Active News</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                <i class="fe-thumbs-down font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">{{ count($inactivenews) }}</h3>
                                <p class="text-muted mb-1 text-truncate">In Active News</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                <i class="fe-eye font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">{{ count($breakingnews) }}</h3>
                                <p class="text-muted mb-1 text-truncate">Breaking News</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3">Lastest News Status</h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                            <thead class="table-light">
                                <tr>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allnews as $news)
                                   @if($loop->index < 5)
                                    <tr>
                                        <td>
                                            <h5 class="m-0 fw-normal">{{ $news->user()->first()?$news->user()->first()->name:'Author' }}</h5>
                                        </td>

                                        <td>
                                            {{ $news->created_at->format('d-m-Y') }}
                                        </td>

                                        <td>
                                            {{ $news->category->category_name }}
                                        </td>

                                        <td>
                                            @if ($news->status == 1)
                                                <span class="badge bg-soft-success text-success">Active</span>
                                            @else
                                                <span class="badge bg-soft-danger text-danger">InActive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach


                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
