@extends('admin.dashboard')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Admin Password Change</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">


                        <div class="tab-pane" id="settings" role="tabpanel">
                            <form method="POST" action="{{route('admin.update.password')}}">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Admin Password Change</h5>
                               @if (session('error'))
                                    <div class="alert alert-danger">{{session('error')}}</div>

                               @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Old Password</label>
                                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="current_password">
                                            @error('old_password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">New Password</label>
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password"  id="new_password">
                                            @error('new_password') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control  @error('confirm_password') is-invalid @enderror"  id="confirm_pasword">
                                            @error('confirm_password') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->




                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div>


@endsection
