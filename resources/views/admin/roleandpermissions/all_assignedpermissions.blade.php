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

                            </ol>
                        </div>
                        <h4 class="page-title">All Asigned Permissions</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Roles Name </th>
                                        <th>Permissions </th>
                                        <th width="18%">Action </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($roles as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>

                                            <td>
                                                @foreach ($item->permissions as $permission)
                                                    <span class="badge rounded-pill bg-danger">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>


                                            <td width="18%">
                                                <a href="{{ route('edit.assignedpermission', $item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

                                                <a href="{{ route('delete.assignedpermission', $item->id) }}"
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
