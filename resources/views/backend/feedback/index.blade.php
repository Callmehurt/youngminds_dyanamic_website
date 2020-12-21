@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Feedback
            </h1>
            <ol class="breadcrumb">
                <li><a style="color: gray;" href="{{url('/dashboard')}}"><i
                                class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li><a href="#"> Feedback</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Feedback</strong></h3>
                    <a href="{{url('/feedback/create')}}" class="pull-right boxTopButton" id="add" data-toggle="tooltip"
                       title="Add New"><i class="fa fa-plus-circle fa-2x"></i></a>

                    <a href="{{url('/feedback')}}" class="pull-right boxTopButton" data-toggle="tooltip"
                       title="View All"><i class="fa fa-list fa-2x"></i></a>

                    <a href="{{URL::previous()}}" class="pull-right boxTopButton" data-toggle="tooltip" title="Go Back">
                        <i class="fa fa-arrow-circle-left fa-2x"></i></a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">

                        <table id="example1" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Title</th>
                                <th style="width: 50px">Type</th>
                                <th>Date</th>
                                <th style="width: 50px" class="text-right">{{trans('app.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($feedbacks as $key=>$feedback)
                                <tr>
                                    <th scope=row>{{++$key}}</th>
                                    <td>{{$feedback->title}}</td>
                                    <td>
                                        @if($feedback->category == 'bug')
                                            <button class="btn btn-block btn-danger btn-xs">Bug / Error</button>
                                        @elseif($feedback->category == 'suggestion')
                                            <button class="btn btn-block btn-primary btn-xs">Suggestion</button>
                                        @else
                                            <button class="btn btn-block btn-success btn-xs">Feedback</button>
                                        @endif
                                    </td>
                                    <td>{{$feedback->date}}</td>
                                    <td class="text-right">
                                        <a href="{{url('feedback/'.$feedback->id .'/edit')}}"
                                           class="text-info btn btn-xs btn-default">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="{{url('feedback/'.$feedback->id)}}"
                                           class="text-info btn btn-xs btn-default">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection