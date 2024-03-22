@extends('frontend.index')
@section('home')
    <div class="contact-page">
        <div class="container">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <div class="row">
                <div class="col-md-4">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-wrpp">


                                <figure class="authorPage-image">
                                    <img alt=""
                                        src="{{ empty($user->photo) ? asset('uploads/no_image.jpg') : asset($user->photo) }}"
                                        class="avatar avatar-96 photo" height="96" width="96" loading="lazy">
                                </figure>
                                <h1 class="authorPage-name">
                                    <a href=" "> {{ $user->name }} </a>
                                </h1>
                                <h6 class="authorPage-name">
                                    {{ $user->email }}
                                </h6>



                                <ul>
                                    <li><a href="{{route('dashboard')}}"><b>🟢 Your Profile </b></a> </li>
                                    <li> <a href="{{route('user.change.password')}}"> <b>🔵 Change Password </b> </a> </li>
                                    <li> <a href=""> <b>🟠 Read Later List </b> </a> </li>
                                    <li> <a href="{{route('user.logout')}}"> <b>🟠 Log Out</b> </a> </li>
                                </ul>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-8">


                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-wrpp">
                                <h4 class="contactAddess-title text-center">
                                    Change Password </h4>
                                <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response">
                                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                                        <ul></ul>
                                    </div>
                                    <form method="POST" action="{{route('user.update.password')}}">
                                        @csrf
                                        <div style="display: none;">

                                        </div>

                                        @if (session('alert-type'))
                                        <div class="alert alert-{{session('alert-type')}} alert-dismissible fade show"
                                            role="alert">
                                            <strong>{{ session('message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                        <div class="main_section">
                                            <div class="row">

                                                <div class="col-md-12 col-sm-12">
                                                    <div class="contact-title ">
                                                        Old Password
                                                    </div>
                                                    <div class="contact-form">
                                                        <span class="wpcf7-form-control-wrap sub_title"><input
                                                                type="password" name="old_password" size="40"
                                                                class="wpcf7-form-control wpcf7-text @error('old_password') is-invalid @enderror" aria-invalid="false"
                                                                placeholder="Old Password"></span>
                                                                @error('old_password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12">
                                                    <div class="contact-title ">
                                                        New Password
                                                    </div>
                                                    <div class="contact-form">
                                                        <span class="wpcf7-form-control-wrap sub_title"><input
                                                                type="password" name="new_password" size="40"
                                                                class="wpcf7-form-control wpcf7-text @error('old_password') is-invalid @enderror" aria-invalid="false"
                                                                placeholder="New Password"></span>
                                                                @error('new_password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12">
                                                    <div class="contact-title ">
                                                        Confirm Password
                                                    </div>
                                                    <div class="contact-form">
                                                        <span class="wpcf7-form-control-wrap sub_title"><input
                                                                type="password" name="confirm_password" size="40"
                                                                class="wpcf7-form-control wpcf7-text @error('old_password') is-invalid @enderror" aria-invalid="false"
                                                                placeholder="Confirm Password"></span>
                                                                @error('confirm_password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                    </div>
                                                </div>



                                        </div>




                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="contact-btn">
                                                    <input type="submit" value="Save Changes"
                                                        class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                                        class="wpcf7-spinner"></span>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </div> <!--  // end row -->




    </div>
    </div>

@endsection
