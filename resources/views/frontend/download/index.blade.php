@extends('layouts.frontend')

@section('content')
    <section class="main-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <th><i class="fa fa-filter" aria-hidden="true" style="margin-right: 5px"></i>SN</th>
                            <th><i class="fa fa-hashtag" aria-hidden="true" style="margin-right: 5px"></i>Title</th>
                            <th><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Created Date</th>
                            <th><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right: 5px"></i>Updated Date</th>
                            <th><i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px"></i>Action</th>
                            </thead>
                            <tbody>
                            @foreach($allDownloads as $key => $value)
                                <tr>
                                    <td data-label="SN">{{++$key}}</td>
                                    <td data-label="Title">{{$value->title}}</td>
                                    <td data-label="Start Date">{{\Carbon\Carbon::parse($value->created_at)->format('M d, Y')}}</td>
                                    <td data-label="End Date">{{\Carbon\Carbon::parse($value->updated_at)->format('M d, Y')}}</td>
                                    <td data-label="Download"><a href="{{route('frontend.downloads.download', [$value->id])}}" target="_blank"><button class="view-btn">View</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div style="margin-top: 2rem">
                        {{ $allDownloads->links() }}
                    </div>
                </div>

                @if(count($allDownloads) < 3)
                    <div class="col-lg-12">
                        <div style="height: 50vh">

                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection