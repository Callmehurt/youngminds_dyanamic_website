@extends('layouts.frontend')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div>
                        <div class="singleNews">
                            <div>
                                <p style="font-size: 35px;color: black;font-weight: 800;line-height: 40px;margin-top: 1.5rem">{{$news->title}}</p>
                                <p style="font-size: 12px;color: #8b8b8b"></strong>{{\Carbon\Carbon::parse($news->notice_date)->format('M d, Y')}}</p>
                            </div>
                            <div class="singleNews_Img">
                                <img src="{{ asset('News/'.$news->banner_image) }}" alt="">
                            </div>
                            <div class="singleNews_content">
                                <p style="font-size: 16px">
                                    {!! $news->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection