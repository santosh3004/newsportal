@extends('frontend.index')
@section('title')
    Home
@endsection
@section('home')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

            </div>
        </div>
    </div>
    @php
        $news_sliders = App\Models\NewsPost::where('top_slider', 1)->where('status', 1)->limit(3)->get();
        $banners = App\Models\Banner::find(1);
    @endphp
    <section class="themesBazar_section_one">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="themesbazar_led_active owl-carousel owl-loaded owl-drag">



                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-1578px, 0px, 0px); transition: all 1s ease 0s; width: 3684px;">
                                        @foreach ($news_sliders as $news_slider)
                                            <div class="owl-item" style="width: 506.25px; margin-right: 20px;">
                                                <div class="secOne_newsContent">
                                                    <div class="sec-one-image">
                                                        <a
                                                            href="{{ url('newsdetails/' . $news_slider->id . '/' . $news_slider->news_title_slug) }}"><img
                                                                class="lazyload" src="{{ asset($news_slider->image) }}"></a>
                                                        <h6 class="sec-small-cat">
                                                            <a
                                                                href="{{ url('newsdetails/' . $news_slider->id . '/' . $news_slider->news_title_slug) }}">
                                                                {{ $news_slider->created_at->format('M d Y') }}
                                                            </a>
                                                        </h6>
                                                        <h1 class="sec-one-title">
                                                            <a
                                                                href="{{ url('newsdetails/' . $news_slider->id . '/' . $news_slider->news_title_slug) }}"><a
                                                                    href="{{ url('newsdetails/' . $news_slider->id . '/' . $news_slider->news_title_slug) }}">{{ //GoogleTranslate::trans($news_slider->news_title, session()->get('locale'))
                                                                        $news_slider->news_title }}</a></a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                            class="fa-solid fa-angle-left"></i></button>
                                    <button type="button" role="presentation" class="owl-next"><i
                                            class="fa-solid fa-angle-right"></i></button>
                                </div>
                                <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                                        role="button" class="owl-dot active"><span></span></button><button role="button"
                                        class="owl-dot"><span></span></button></div>
                            </div>


                        </div>
                        <div class="col-lg-5 col-md-5">

                            @php
                                $section_threes = App\Models\NewsPost::where('status', 1)
                                    ->where('first_section_three', 1)
                                    ->limit(3)
                                    ->get();
                            @endphp

                            @foreach ($section_threes as $section_three)
                                <div class="secOne-smallItem">
                                    <div class="secOne-smallImg">
                                        <a href="{{url('newsdetails/'.$section_three->id).'/'.$section_three->news_title_slug}}"><img class="lazyload"
                                                src="{{ asset($section_three->image) }}"></a>
                                        <h5 class="secOne_smallTitle">
                                            <a href="{{url('newsdetails/'.$section_three->id).'/'.$section_three->news_title_slug}}">{{ //GoogleTranslate::trans($section_three->news_title, session()->get('locale'))
                                                $section_three->news_title }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>

                    @php
                        $section_nines = App\Models\NewsPost::where('first_section_nine', 1)
                            ->where('status', 1)
                            ->limit(9)
                            ->get();
                    @endphp
                    <div class="sec-one-item2">
                        <div class="row">
                            @foreach ($section_nines as $section_nine)
                                <div class="themesBazar-3 themesBazar-m2">
                                    <div class="sec-one-wrpp2">
                                        <div class="secOne-news">
                                            <div class="secOne-image2">
                                                <a href="{{url('newsdetails/'.$section_nine->id).'/'.$section_nine->news_title_slug}}"><img class="lazyload"
                                                        src="{{ asset($section_nine->image) }}"></a>
                                            </div>
                                            <h4 class="secOne-title2">
                                                <a href="{{url('newsdetails/'.$section_nine->id).'/'.$section_nine->news_title_slug}}">{{ //GoogleTranslate::trans($section_nine->news_title, session()->get('locale'))
                                                    $section_nine->news_title }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="cat-meta">
                                            <a href="{{url('newsdetails/'.$section_nine->id).'/'.$section_nine->news_title_slug}}"> <i class="lar la-newspaper"></i>
                                                {{ $section_nine->created_at->format('Y M d') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="live-item">
                        <div class="live_title">
                            <a href=" ">LIVE TV </a>
                            <div class="themesBazar"></div>
                        </div>
                        @php
                            $live = App\Models\Gallery::findOrFail(6);
                        @endphp
                        <div class="popup-wrpp">
                            <div class="live_image">
                                <img width="700" height="400"
                                    src="{{ $live->photo ? asset($live->photo) : asset('uploads/no_image.jpg') }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                    loading="lazy">
                                <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i>
                                </div>
                            </div>
                            <div class="live-popup">
                                <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles"
                                    aria-describedby="modal-contents">
                                    <div id="modal-contents">

                                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                            <iframe width="971" height="546"
                                                src="{{ 'https://www.youtube.com/embed/' . $live->video }}"
                                                title="{{ $live->title }}" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="themesBazar_widget">
                        <h3 style="margin-top:5px"> OLD NEWS </h3>
                    </div>
                    <form class="wordpress-date" action="{{ route('search-by-date') }}" method="post">
                        @csrf
                        <input type="date" id="wordpress" placeholder="Select Date" autocomplete="off" value=""
                            name="date" required="" class="hasDatepicker">
                        <input type="submit" value="Search">
                    </form>
                    <div class="recentPopular">
                        <ul class="nav nav-pills" id="recentPopular-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" id="recent-tab" data-bs-toggle="pill"
                                    data-bs-target="#recent" role="tab" aria-controls="recent"
                                    aria-selected="false"> LATEST </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="popular-tab" data-bs-toggle="pill" data-bs-target="#popular"
                                    role="tab" aria-controls="popular" aria-selected="false"> POPULAR </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane active show  fade" id="recent" role="tabpanel" aria-labelledby="recent">
                            <div class="news-titletab">
                                @foreach ($latestnews as $news)
                                    <div class="tab-image tab-border">
                                        <a href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                        <a href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"
                                            class="tab-icon"><i class="la la-play"></i></a>
                                        <h4 class="tab_hadding"><a
                                                href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}">{{ //GoogleTranslate::trans($news->news_title, session()->get('locale'))
                                                    $news->news_title }}
                                            </a></h4>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular">
                            <div class="news-titletab">
                                @foreach ($popularnews as $news)
                                    <div class="tab-image tab-border">
                                        <a href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                        <a href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"
                                            class="tab-icon"><i class="la la-play"></i></a>
                                        <h4 class="tab_hadding"><a
                                                href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}">
                                                {{ //GoogleTranslate::trans($news->news_title, session()->get('locale'))
                                                    $news->news_title }}</a>
                                        </h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($banners->home_one) }}" alt="Advertisement Banner" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($banners->home_two) }}" alt="Advertisement Banner" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $allnews = App\Models\NewsPost::where('status', 1)->orderBy('id', 'ASC')->limit(8)->get();
        $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
    @endphp
    <section class="section-two">
        <div class="container">
            <div class="secTwo-color">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="themesBazar_cat6">
                            <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active" id="allnewstablink" data-bs-toggle="pill"
                                        data-bs-target="#allnewstab" role="tab" aria-controls="allnewstab"
                                        aria-selected="true">
                                        ALL
                                    </div>
                                </li>
                                @foreach ($categories as $key => $category)
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link" id="category-tab{{ $category->id }}"
                                            data-bs-toggle="pill" data-bs-target="#category{{ $category->id }}"
                                            role="tab" aria-controls="Info-tabs{{ $category->id }}"
                                            >
                                            {{ $category->category_name }}
                                        </div>
                                    </li>
                                    @endforeach
                                    <span class="themeBazar6"></span>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="allnewstab" role="tabpanel"
                                aria-labelledby="allnewstab ">
                                <div class="row">
                                    @foreach ($allnews as $news)
                                        <div class="themesBazar-4 themesBazar-m2">
                                            <div class="sec-two-wrpp">
                                                <div class="section-two-image">

                                                    <a
                                                        href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                            class="lazyload" src="{{ asset($news->image) }}"></a>
                                                </div>
                                                <h5 class="sec-two-title">
                                                    <a href=" ">{{ $news->news_title }} </a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @foreach ($categories as $category)
                                <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel"
                                    aria-labelledby="category-tab{{$category->id}} ">
                                    <div class="row">
                                        @php
                                            $catwiseNews = App\Models\NewsPost::where('category_id', $category->id)
                                                ->orderBy('id', 'DESC')
                                                ->get();
                                        @endphp
                                        @foreach ($catwiseNews as $news)
                                            <div class="themesBazar-4 themesBazar-m2">
                                                <div class="sec-two-wrpp">
                                                    <div class="section-two-image">

                                                        <a
                                                            href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                                    </div>
                                                    <h5 class="sec-two-title">
                                                        <a href=" ">{{ $news->news_title }} </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($banners->home_three) }}" alt="Advertisement Banner" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="{{ asset($banners->home_four) }}" alt="Advertisement Banner" width="100%"
                                height="auto"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="section-ten">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-camera"></i> PHOTO
                            GALLERY </a></h2>

                    <div class="homeGallery owl-carousel owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">
                                @php
                                    $photos = App\Models\Gallery::where('type', 'photo')->latest()->get();
                                @endphp
                                @foreach ($photos as $photo)
                                    <div class="owl-item" style="width: 784px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="photo">
                                                <a class="themeGallery" href="{{ asset($photo->photo) }}">
                                                    <img src="{{ asset($photo->photo) }}" alt="PHOTO"></a>
                                                <h3 class="photoCaption">
                                                    <a href=" ">{{ $photo->created_at->diffForHumans() }} </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="las la-angle-left"></i></button><button type="button" role="presentation"
                                class="owl-next disabled"><i class="las la-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                    <div class="homeGallery1 owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transition: all 1s ease 0s; width: 2515px; transform: translate3d(-463px, 0px, 0px);">
                                @foreach ($photos as $photo)
                                    <div class="owl-item" style="width: 122.333px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="phtot2">
                                                <a class="themeGallery" href="{{ asset($photo->photo) }}">
                                                    <img src="{{ asset($photo->photo) }}" alt="PHOTO"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation"
                                class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button"
                                role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots"><button role="button"
                                class="owl-dot active"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-video"></i> VIDEO
                            GALLERY </a></h2>

                    <div class="white-bg">


                        @php
                            $videos = App\Models\Gallery::where('type', 'video')->latest()->get();
                        @endphp
                        @foreach ($videos as $video)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <img src="{{ asset($video->photo) }}">
                                    <a href="{{ 'https://www.youtube.com/embed/' . $video->video }}"
                                        class="home-video-icon popup"><i class="las la-video"></i></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ $video->video }}" class="popup">
                                            {{ $video->title }}</a>
                                    </h5>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
