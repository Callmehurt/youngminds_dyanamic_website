@extends('layouts.frontend')

@section('content')

    <section>
        <div class="carousel-wrapper">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    @foreach($carousels as $key => $carousel)
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{++$key}}"></li>
                        @endforeach
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1920/768?random=1" class="d-block w-100" alt="...">
                    </div>
                    @foreach($carousels as $carousel)
                    <div class="carousel-item">
                        <img src="{{asset('uploads/carousel/'.$carousel->carousel_image)}}" class="d-block w-100" alt="..." style="height: 100%;width: 100%;object-fit: cover;object-position: top">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="tab-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs">
                        <ul>
                            <li class="active">
                                <span class="icon"></span>
                                <span class="text">Notice</span>
                            </li>
                            <li>
                                <span class="icon"></span>
                                <span class="text">Events</span>
                            </li>
                            <li>
                                <span class="icon"></span>
                                <span class="text">Downloads</span>
                            </li>
                            <li>
                                <span class="icon"></span>
                                <span class="text">News</span>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <div class="tab-wrap active">
                            <div class="title">
                                Notice
                            </div>
                            <div class="tab_content">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <th><i class="fa fa-hashtag" aria-hidden="true" style="margin-right: 5px"></i>Title</th>
                                    <th style="width: 150px !important;"><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Notice Date</th>
                                    <th><i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px"></i>Details</th>
                                    <th style="width: 180px !important;"><i class="fa fa-download" aria-hidden="true" style="margin-right: 5px"></i>View/Download</th>
                                    </thead>
                                    <tbody>
                                    @foreach($allNotice as $notice)
                                        <tr>
                                            <td data-label="Title"><a href="{{route('frontend.getNotice', [$notice->id])}}" class="link">{{$notice->title}}</a></td>
                                            <td data-label="Notice Date">{{\Carbon\Carbon::parse($notice->notice_date)->format('M d, Y')}}</td>
                                            <td data-label="Details">
                                                @if(strlen($notice->content) > 200)
                                                    {!! substr($notice->content, 0, 200) !!}
                                                    ....
                                                @else
                                                    {!! $notice->content !!}
                                                @endif
                                            </td>
                                            <td data-label="Download"><a href="{{route('frontend.notice.download', [$notice->id])}}"><button class="view-btn">View</button></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('frontend.notices')}}"><button class="btn btn-primary">View More</button></a>
                            </div>
                        </div>
                        <div class="tab-wrap">
                            <div class="title">
                                Events
                            </div>
                            <div class="tab_content">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <th><i class="fa fa-hashtag" aria-hidden="true" style="margin-right: 5px"></i>Title</th>
                                    <th style="width: 150px !important;"><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Start Date</th>
                                    <th style="width: 150px !important;"><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>End Date</th>
                                    <th><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 5px"></i>Venue</th>
                                    <th><i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px"></i>Details</th>
                                    </thead>
                                    <tbody>
                                    @foreach($allEvents as $event)
                                        <tr>
                                            <td data-label="Title">{{$event->title}}</td>
                                            <td data-label="Start Date">{{\Carbon\Carbon::parse($event->start_date)->format('M d, Y')}}</td>
                                            <td data-label="End Date">{{\Carbon\Carbon::parse($event->end_date)->format('M d, Y')}}</td>
                                            <td data-label="Venue">{{$event->venue}}</td>
                                            <td data-label="Details">
                                                @if(strlen($event->content) > 150)
                                                    {!! substr($event->content, 0, 150) !!}
                                                    ....
                                                @else
                                                    {!! $event->content !!}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('frontend.events')}}"><button class="btn btn-primary">View More</button></a>
                            </div>
                        </div>
                        <div class="tab-wrap">
                            <div class="title">
                                Downloads
                            </div>
                            <div class="tab_content">
                                <table class="table table-hover table-bordered">
                                    <tbody>
                                    @foreach($allDownloads as $download)
                                        <tr>
                                            <td data-label="Title">{{$download->title}}</td>
                                            <td data-label="Download"><a href="{{route('frontend.downloads.download', [$download->id])}}" target="_blank"><button class="view-btn">View</button></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('frontend.downloads')}}"><button class="btn btn-primary">View More</button></a>
                            </div>
                        </div>
                        <div class="tab-wrap">
                            <div class="title">
                                News
                            </div>
                            <div class="tab_content">
                                <table class="table table-hover table-bordered">
                                    <tbody>
                                    @foreach($allNews as $news)
                                        <tr>
                                            <td data-label="Title"><a href="{{route('frontend.getNews', [$news->id])}}" class="link">{{$news->title}}</a></td>
                                            <td data-label="Published Date"><i class="fa fa-calendar" style="margin-right: 7px"></i>{{\Carbon\Carbon::parse($news->created_at)->format('M d, Y')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('frontend.news')}}"><button class="btn btn-primary">View More</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var tabs = document.querySelectorAll(".tabs ul li");
        var tabs_wrap = document.querySelectorAll(".tab-wrap");

        tabs.forEach(function (tab, tab_index) {
            tab.addEventListener('click', function () {
                tabs.forEach(function (tab) {
                    tab.classList.remove("active");
                })
                tab.classList.add("active");

                tabs_wrap.forEach(function (content, content_index) {
                    if(content_index == tab_index){
                        content.classList.add('active');
                    }else{
                        content.classList.remove('active');
                    }
                })
            })
        })

    </script>

    @endsection