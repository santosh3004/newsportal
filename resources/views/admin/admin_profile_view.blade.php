@extends('admin.dashboard')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Admin Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{empty($user->photo)?asset('upload/no_image.jpg'):asset($user->photo)}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-0">{{$user->name}}</h4>
                    <p class="text-muted">{{$user->username}}</p>

                    <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                    <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                    <div class="text-start mt-3">

                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$user->name}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{$user->phone}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{$user->email}}</span></p>


                    </div>


                </div>
            </div> <!-- end card -->


        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">


                        <div class="tab-pane" id="settings" role="tabpanel">
                            <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Admin Personal Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">User Name</label>
                                            <input type="text" class="form-control" name="username"  value="{{$user->username}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control"  value="{{$user->name}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"  value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control"  value="{{$user->phone}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Profile Image</label>
                                            <input type="file" id="image" name="photo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Profile Image</label>
                                            <img  id="showImage" src="{{empty($user->photo)?asset('upload/no_image.jpg'):asset($user->photo)}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div>
                                </div>



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

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
    </script>
@endsection
