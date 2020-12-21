@extends('layouts.frontend')

@section('content')
    <section class="main-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <th><i class="fa fa-hashtag" aria-hidden="true" style="margin-right: 5px"></i>Title</th>
                            <th style="width: 150px !important;"><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Notice Date</th>
                            <th><i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px"></i>Details</th>
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                @if(count($allNotice) < 4)
                    <div class="col-lg-12">
                        <div style="height: 80vh">

                        </div>
                    </div>
                @endif>
            </div>
        </div>
    </section>
@endsection