@extends('frontend.index')
@section('title'){{$news->news_title}} @endsection
@section('home')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <div class="single-add">
                </div>

                <div class="single-cat-info">
                    <div class="single-home">
                        <i class="la la-home"> </i><a href="{{route('home')}}"> HOME </a>
                    </div>
                    <div class="single-cats">
                        <i class="la la-bars"></i> <a href="{{url('news/category/'.$news['category']['id'].'/'.$news['category']['category_slug'])}}" rel="category tag">{{ $news['category']['category_name'] }}</a>,

                        @if ($news->subcategory_id == null)
                        @else
                            <a href=" " rel="category tag">{{ $news['subcategory']['subcategory_name'] }}</a>
                        @endif
                    </div>
                </div>


                <h1 class="single-page-title">
                    {{ $news->news_title }}</h1>
                <div class="row g-2">
                    <div class="col-lg-1 col-md-2 ">
                        <div class="reportar-image">
                            <img
                                src="{{ !empty($news->user()->first()->photo) ? url('upload/admin_images/' . $news->user()->first()->photo) : url('uploads/no_image.jpg') }}">
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-10">
                        <div class="reportar-title">
                            Posted By <a href="{{ route('reporter.news',$news->user_id) }}">{{ $news['user']['name'] }} </a>
                        </div>
                        <div class="viwe-count">
                            <ul>
                                <li><i class="la la-clock-o"></i> Updated
                                    {{ $news->updated_at->format('l M d Y') }}
                                </li>
                                <li> / <i class="la la-eye"></i>
                                    {{ $news->view_count }}
                                    Read
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-image">
                    <a href=" "><img class="lazyload" src="{{ asset($news->image) }}"></a>
                    <h2 class="single-caption2">
                        {{ $news->news_title }}
                    </h2>
                </div>

                <div class="single-page-add2">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="inc">A+</button>
                    <button id="dec">A-</button>
                </div>
                <news-font>
                    <div class="single-details">
                        <p>{!! $news->news_details !!}
                        </p>
                    </div>
                </news-font>
                <div class="singlePage2-tag">
                    <span> Tags : </span>
                    @foreach ($tags_all as $tag)
                        <a href=" " rel="tag">{{ ucwords($tag) }}</a>
                    @endforeach
                </div>

                <div class="single-add">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>

                <h3 class="single-social-title">
                    Share News </h3>
                <div class="single-page-social">
                    <a href=" " target="_blank" title="Facebook"><i class="lab la-facebook-f"></i></a><a
                        href=" " target="_blank"><i class="lab la-twitter"></i></a><a href=" "
                        target="_blank"><i class="lab la-linkedin-in"></i></a><a href=" " target="_blank"><i
                            class="lab la-digg"></i></a><a href=" " target="_blank"><i
                            class="lab la-pinterest-p"></i></a><a onclick="printFunction()" target="_blank"><i
                            class="las la-print"></i>
                        <script>
                            function printFunction() {
                                window.print();
                            }
                        </script>
                    </a>
                </div>
 @php
                            $reviews = App\Models\Review::where('news_id', $news->id)
                                ->latest()
                                ->limit(5)
                                ->get();
                        @endphp


                        @foreach ($reviews as $review)

                            @if ($review->status == 0)

                            @else
                <div class="author2">
                    <div class="author-content2">
                        <h6 class="author-caption2">
                            <span> COMMENTS </span>
                        </h6>


                                <div class="author-image2">
                                    <img alt="" src="{{ $review->user()->first()->photo ? asset($review->user()->first()->photo) : asset('uploads/no_image.jpg') }}
    " class="avatar avatar-96 photo"
                                        height="96" width="96" loading="lazy">
                                </div>
                                <div class="authorContent">
                                    <h1 class="author-name2">
                                        <a href=" "> {{$review->user()->first()->name}} </a>
                                    </h1>
                                    <p> {{ $review->created_at->diffForHumans() }} </p>
                                    <div class="author-details">{{$review->comment}}</div>
                                </div>

                    </div>
                </div>
                @endif

                @endforeach

                <hr>


                @guest

                    <p> Please <a href="{{ route('login') }}">Login</a> to Comment</p>
                @else
                    <form action="{{ route('store.review') }}" method="post" class="wpcf7-form init" novalidate="novalidate"
                        data-status="init">
                        @csrf
                        <div style="display: none;">

                        </div>
                        <div class="main_section">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <input hidden name="news_id" value="{{ $news->id }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-title">
                                        Comments
                                    </div>
                                    <div class="contact-form">
                                        <span class="wpcf7-form-control-wrap news_details">
                                            <textarea name="comment" cols="20" rows="5"
                                                class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"
                                                placeholder="Comment Text"></textarea>
                                        </span>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-btn">
                                    <input type="submit" value="Submit Comments"
                                        class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                        class="wpcf7-spinner"></span>
                                </div>
                            </div>
                        </div>

                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                @endguest



                <div class="single_relatedCat">
                    <a href=" ">Related News </a>
                </div>
                <div class="row">

                    @foreach ($relatednews as $news)
                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="related-wrpp">
                                <div class="related-image">

                                    <a href="{{ url('news/details/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                            class="lazyload" src="{{ asset($news->image) }}"></a>
                                </div>
                                <h4 class="related-title">

                                    <a href="{{ url('news/details/' . $news->id . '/' . $news->news_title_slug) }}">{{ $news->news_title }}
                                    </a>
                                </h4>
                                <div class="related-meta">
                                    <a href=" "><i class="la la-tags"> </i>
                                        {{ $news->created_at->format('l M d Y') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="sitebar-fixd" style="position: sticky; top: 0;">
                    <div class="siteber-add">
                        <div class="themesBazar_widget">
                            <div class="textwidget">
                                <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    @php
                                        $banners=App\Models\Banner::where('id',1)->first();
                                    @endphp
                                        src="{{ asset($banners->news_details_one) }}" alt="Advertisement Here"
                                        width="100%" height="auto">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="singlePopular">
                        <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" data-bs-toggle="pill" data-bs-target="#archiveTab_recent"
                                    role="tab" aria-controls="archiveRecent" aria-selected="true"> LATEST </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular"
                                    role="tab" aria-controls="archivePopulars" aria-selected="false"> POPULAR
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContentarchive">
                        <div class="tab-pane fade active show" id="archiveTab_recent" role="tabpanel"
                            aria-labelledby="archiveRecent">

                            <div class="archiveTab-sibearNews">

                                @foreach ($latestnews as $key => $news)
                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <a
                                                href="{{ url('news/details/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                    class="lazyload" src="{{ asset($news->image) }}"></a>
                                        </div>
                                        <a href="{{ url('news/details/' . $news->id . '/' . $news->news_title_slug) }}"
                                            class="archiveTab-icon2"><i class="la la-play"></i></a>
                                        <h4 class="archiveTab_hadding"><a href=" ">{{ $news->news_title }}
                                            </a>
                                        </h4>
                                        <div class="archive-conut">
                                            {{ $key + 1 }}
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel"
                            aria-labelledby="archivePopulars">
                            <div class="archiveTab-sibearNews">

                                @foreach ($popularnews as $key => $news)
                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <a
                                                href="{{ url('news/details/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                    class="lazyload" src="{{ asset($news->image) }}"></a>
                                        </div>
                                        <a href="{{ url('news/details/' . $news->id . '/' . $news->news_title_slug) }}"
                                            class="archiveTab-icon2"><i class="la la-play"></i></a>
                                        <h4 class="archiveTab_hadding"><a href=" ">{{ $news->news_title }}
                                            </a>
                                        </h4>
                                        <div class="archive-conut">
                                            {{ $key + 1 }}
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="siteber-add2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <script type="text/javascript">
        var size = 16;

        function setFontSize(s) {
            size = s;
            $('news-font').css('font-size', '' + size + 'px');
        }

        function increaseFontSize() {
            setFontSize(size + 5);
        }

        function decreaseFontSize() {
            if (size > 5)
                setFontSize(size - 5);
        }
        $('#inc').click(increaseFontSize);
        $('#dec').click(decreaseFontSize);
        setFontSize(size);
    </script>
@endsection
