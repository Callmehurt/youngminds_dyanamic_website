@extends('layouts.frontend')

@section('content')
    <section class="main-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <th style="width: 100px !important;"><i class="fa fa-filter" aria-hidden="true" style="margin-right: 5px"></i>SN</th>
                            <th><i class="fa fa-hashtag" aria-hidden="true" style="margin-right: 5px"></i>Title</th>
                            <th style="width: 150px !important;"><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Start Date</th>
                            <th style="width: 150px !important;"><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>End Date</th>
                            <th><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 5px"></i>Venue</th>
                            <th><i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px"></i>Details</th>
                            </thead>
                            <tbody>
                            @foreach($allEvents as $key => $event)
                            <tr>
                                <td data-label="SN">{{++$key}}</td>
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
                    </div>
                </div>
                    <div class="col-lg-12">
                        <div style="margin-top: 2rem">
                            {{ $allEvents->links() }}
                        </div>
                    </div>
                @if(count($allEvents) < 3)
                <div class="col-lg-12">
                    <div style="height: 50vh">

                    </div>
                </div>
                    @endif

            </div>
        </div>
    </section>
    @endsection