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
                                <a href="{{ route('add.subcategory') }}" class="btn btn-blue waves-effect waves-light">Add
                                    Sub Category</a>
                            </ol>
                        </div>
                        <h4 class="page-title">All Sub Category</h4>
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
                                        <th>Category Name </th>
                                        <th>Sub Category Name </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($subcategories as $key => $subcategory)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{$subcategory['category']['category_name']}}
                                            <td>{{ $subcategory->subcategory_name }}</td>
                                            <td>
                                                <a href="{{ route('edit.subcategory',$subcategory->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

                                                <a id="delete" href="{{ route('delete.subcategory',$subcategory->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light">Delete</a>

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
