@extends('layouts.frontend')

@section('content')
    <section class="main-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="notice-wrapper">
                        <h3>{!! $notice->title !!}</h3>
                        <div class="notice-img">
                            <img src="{{asset('Notice/'.$notice->notice_banner)}}" alt="">
                        </div>
                        <div class="notice-content">
                            <p><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i><strong>Notice Date: {{\Carbon\Carbon::parse($notice->notice_date)->format('M d, Y')}}</strong></p>
                            <p>{!! $notice->content !!}</p>
                            <a href="{{route('frontend.notice.download', [$notice->id])}}"><button class="downloadBtn">View/Download</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="notice-detail">
                        <h3>Other Details</h3>
                        <hr>
                        <p><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Posted On: {{\Carbon\Carbon::parse($notice->created_at)->format('M d, Y')}}</p>
                        <p><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Updated On: {{\Carbon\Carbon::parse($notice->updated_at)->format('M d, Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection