@extends('admin.dashboard')
@section('main')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.photos') }}" class="btn btn-blue waves-effect waves-light">Add
                                    Photo</a>
                            </ol>
                        </div>
                        <h4 class="page-title">All Photos</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image </th>
                                        <th>Date</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($photos as $key => $photo)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($photo->photo) }}"
                                                    style="width:50px; height:50px;"> </td>
                                            <td>{{ $photo->created_at }}</td>
                                            <td>
                                                <a href="{{ route('edit.photo', $photo->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

                                                <a href="{{ route('delete.photo', $photo->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->



        </div> <!-- container -->

    </div> <!-- content -->

@endsection





