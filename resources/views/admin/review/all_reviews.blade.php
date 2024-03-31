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
                    <a href="{{ route('pending.reviews') }}" class="btn btn-blue waves-effect waves-light">Pending Reviews </a>
                </ol>
            </div>
                                    <h4 class="page-title">All Reviews <span class="btn btn-danger"> {{ count($reviews) }} </span> </h4>
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
                    <th>Sl</th>
                    <th>Image </th>
                    <th>News </th>
                    <th>User </th>
                    <th>Comment </th>
                    <th>Status </th>
                    <th>Action </th>
                </tr>
            </thead>


            <tbody>
            	@foreach($reviews as $key=> $review)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset($review['news']['image']) }} " style="width: :50px; height:50px;" ></td>
                    <td>{{ $review['news']['news_title'] }}</td>
                    <td>{{ $review['user']['name'] }}</td>
                    <td>{{ Str::limit($review->comment ,25)  }}</td>
                    <td>
      @if($review->status == 0)
      <span class="badge badge-pill bg-danger">Pending</span>

                        @else
     <span class="badge badge-pill bg-success">Approved</span>
                        @endif


                    </td>
                    <td>
                        @if($review->status == 0)

      <a href="{{ route('approve.review',$review->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light" id="approve" >Approve </a>
      @else
      <a href="{{ route('reject.review',$review->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light" id="reject" >Reject </a>

                        @endif
                        <a href="{{ route('delete.review',$review->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light" id="delete" >Delete </a>
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
