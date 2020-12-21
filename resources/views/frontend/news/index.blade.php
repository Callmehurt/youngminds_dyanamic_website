@extends('layouts.frontend')

@section('content')
    <section class="main-wrapper">
        <div class="container">
                @foreach($allNews as $news)
                <div class="row justify-content-center">
                <div class="col-lg-8">
                        <div class="newsBx">
                            <div style="position: relative;width: 100%;height: auto;display: flex;flex-direction: row;justify-content: flex-start">
                                <div class="newsBx_text">
                                    <a href="{{route('frontend.getNews', [$news->id])}}" class="link"><p>
                                            @if(strlen($news->title) > 150)
                                                {{substr($news->title, 0, 150) }}
                                                ....
                                            @else
                                                {{ $news->title }}
                                            @endif
                                        </p></a>
                                </div>
                                <div class="newsBx_img">
                                    <img src="{{ asset('News/'.$news->banner_image) }}" alt="">
                                </div>
                            </div>
                            <div class="newsBx_contentText">
                                @if(strlen($news->content) > 200)
                                    {!! substr($news->content, 0, 200) !!}
                                    ....
                                @else
                                    {!! $news->content !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-top: 2rem">
                        {{ $allNews->links() }}
                    </div>
                </div>
                @if(count($allNews) < 3)
                    <div class="col-lg-12">
                        <div style="height: 50vh">

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endsection