@extends('admin.dashboard')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                                <li class="breadcrumb-item active">Update Site Information</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Update Site Information</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('update.site.settings') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Site Title</label>
                                        <input type="text" value="{{$siteinfo->site_title}}" name="site_title" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Address</label>
                                        <input type="text" value="{{$siteinfo->address}}" name="address" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" value="{{$siteinfo->email}}" name="email" class="form-control" id="inputEmail4">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label"> Contact </label>
                                        <input type="text" value="{{$siteinfo->contact}}" name="contact" class="form-control" id="inputEmail4">
                                    </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label"> Logo </label>
                                        <input type="file" name="logo" class="form-control"id="image">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label"> </label>
                                        <img id="showImage" src="{{ $siteinfo->logo?asset($siteinfo->logo):asset('uploads/no_image.jpg') }} "
                                            class="avatar-xlg img-thumbnail" alt="Thumbnail Image">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Facebook Link</label>
                                        <input type="text" value="{{$siteinfo->facebook}}" name="facebook" class="form-control" id="inputEmail4">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Youtube Link</label>
                                        <input type="text" value="{{$siteinfo->youtube}}" name="youtube" class="form-control" id="inputEmail4">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Twitter Link</label>
                                        <input type="text" value="{{$siteinfo->twitter}}" name="twitter" class="form-control" id="inputEmail4">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Instagram Link</label>
                                        <input type="text" value="{{$siteinfo->instagram}}" name="instagram" class="form-control" id="inputEmail4">
                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Site Settings
                                    </button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->



        </div> <!-- container -->

    </div> <!-- content -->



    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
