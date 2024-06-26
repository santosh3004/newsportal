@extends('frontend.index')
@section('title'){{$allcategorynews[0]->category()->first()->category_name}} @endsection
@section('home')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="archive-topAdd">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="rachive-info-cats">
                    <a href=" "><i class="las la-home"></i> </a> <i class="las la-chevron-right"></i>
                    {{ $allcategorynews[0]->category()->first()->category_name }}
                    @if ($allcategorynews[0]->subcategory_id != null)
                        <i class="las la-chevron-right"></i>
                        {{ $allcategorynews[0]->subcategory()->first()->subcategory_name }}
                    @endif
                </div>
                <div class="row">

                    @foreach ($allcategorynews as $news)
                        @if ($loop->index < 1)
                            <div class="col-lg-8 col-md-8">
                                <div class="archive-shadow arch_margin">
                                    <div class="archive1_image">
                                        <a href="{{ url('newsdetails/'.$news->id.'/'.$news->news_title_slug) }}"><img
                                                class="lazyload" src="{{ asset($news->image) }}"></a>
                                        <div class="archive1-meta">
                                            <a href="{{ url('newsdetails/'.$news->id.'/'.$news->news_title_slug) }}"><i class="la la-tags"> </i>
                                                {{ $news->created_at->format('l M d Y') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="archive1-padding">
                                        <div class="archive1-title"><a
                                                href="{{ url('newsdetails/'.$news->id.'/'.$news->news_title_slug) }}">{{ $news->news_title }}</a>
                                        </div>
                                        <div class="content-details"> {!! Str::limit($news->news_details, 50) !!} <a
                                                href="{{ url('newsdetails/'.$news->id.'/'.$news->news_title_slug) }}"> Read
                                                More </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach


                    <div class="col-md-4 col-sm-4">

                        <div class="row">

                            @foreach ($latesttwonews as $news)
                                @if ($loop->index > 0)
                                    <div class="archive1-custom-col-12">
                                        <div class="archive-item-wrpp2">
                                            <div class="archive-shadow arch_margin">
                                                <div class="archive1_image2">
                                                    <a
                                                        href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                            class="lazyload" src="{{ asset($news->image) }}"></a>
                                                    <div class="archive1-meta">
                                                        <a href=" "><i class="la la-tags"> </i>
                                                            {{ $news->created_at->format('l M d Y') }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="archive1-padding">
                                                    <div class="archive1-title2"><a
                                                            href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}">{{ $news->news_title }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>



                <div class="row">

                    @foreach ($allcategorynews as $news)
                        @if ($loop->index > 1)
                            <div class="archive1-custom-col-3">
                                <div class="archive-item-wrpp2">
                                    <div class="archive-shadow arch_margin">
                                        <div class="archive1_image2">
                                            <a href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                    class="lazyload" src="{{ asset($news->image) }}"></a>
                                            <div class="archive1-meta">
                                                <a href=" "><i class="la la-tags"> </i>
                                                    {{ $news->created_at->format('l M d Y') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="archive1-padding">
                                            <div class="archive1-title2"><a
                                                    href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}">
                                                    {{ $news->news_title }} </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach




                </div>
                <div class="archive1-margin">
                    <div class="archive-content">
                        <div class="row">
                        </div>
                    </div>
                </div>




                <br><br>

                <div class="row">
                    <div class="col-lg-12 col-md-12"></div>
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
                    <div class="archivePopular">
                        <ul class="nav nav-pills" id="archivePopular-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" data-bs-toggle="pill" data-bs-target="#archiveTab_recent"
                                    role="tab" aria-controls="archiveRecent" aria-selected="true"> LATEST </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular"
                                    role="tab" aria-controls="archivePopulars" aria-selected="false"> POPULAR </div>
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
                                                href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                    class="lazyload" src="{{ asset($news->image) }}"></a>
                                        </div>
                                        <a href=" " class="archiveTab-icon2"><i class="la la-play"></i></a>
                                        <h4 class="archiveTab_hadding"><a
                                                href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}">{{ $news->news_title }}
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
                                                href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}"><img
                                                    class="lazyload" src="{{ asset($news->image) }}"></a>
                                        </div>
                                        <a href=" " class="archiveTab-icon2"><i class="la la-play"></i></a>
                                        <h4 class="archiveTab_hadding"><a
                                                href="{{ url('newsdetails/' . $news->id . '/' . $news->news_title_slug) }}">{{ $news->news_title }}
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
@endsection
