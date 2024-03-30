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

                                <li class="breadcrumb-item active">Add Video</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Video</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('store.video') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Video Title</label>
                                        <input type="text" name="title" class="form-control" id="inputEmail4">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label"> Video Url </label>
                                        <input type="text" name="video" class="form-control" id="inputEmail4">
                                    </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Thumbnail </label>
                                        <input type="file" name="thumbnail" class="form-control"id="image">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label"> </label>
                                        <img id="showImage" src="{{ url('uploads/no_image.jpg') }} "
                                            class="rounded-circle avatar-lg img-thumbnail" alt="Thumbnail Image">
                                    </div>





                                </div>



                                <button type="submit" class="btn btn-primary waves-effect waves-light">Add Video
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
