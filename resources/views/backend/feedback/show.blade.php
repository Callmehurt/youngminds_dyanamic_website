@extends('backend.layouts.app')
@section('title','Features')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Feedback
            </h1>
            <ol class="breadcrumb">
                <li><a style="color: gray;" href="{{url('/dashboard')}}"><i
                                class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li><a href="#"> Feedback</a></li>
                <li><a href="#"> Details</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')
            <div class="box box-danger">
                <div class="box-header with-border">

                    <h3 class="box-title"></h3>
                    <a href="{{url('/feedback/create')}}" class="pull-right boxTopButton" id="add" data-toggle="tooltip"
                       title="Add New"><i class="fa fa-plus-circle fa-2x"></i></a>

                    <a href="{{url('/feedback')}}" class="pull-right boxTopButton" data-toggle="tooltip"
                       title="View All"><i class="fa fa-list fa-2x"></i></a>

                    <a href="{{URL::previous()}}" class="pull-right boxTopButton" data-toggle="tooltip" title="Go Back">
                        <i class="fa fa-arrow-circle-left fa-2x"></i></a>

                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Title : {{$feedback->title}}</h3>
                                    <a href="{{url('feedback/'.$feedback->id .'/edit')}}"
                                       class="text-info btn btn-xs btn-default">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </div>

                                <div class="tab-content">
                                    <div class="active">
                                        <div class="box-body box-profile">

                                            <div class="post">
                                                <table class="table table-bordered table-responsive table-hover">
                                                    <tr>
                                                        <td>Type</td>
                                                        <td>
                                                            @if($feedback->category == 'bug')
                                                                <button class="btn btn-danger btn-xs">Bug / Error</button>
                                                            @elseif($feedback->category == 'suggestion')
                                                                <button class="btn btn-primary btn-xs">Suggestion</button>
                                                            @else
                                                                <button class="btn btn-success btn-xs">Feedback</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date</td>
                                                        <td>{{$feedback->date}}</td>
                                                    </tr>

                                                    @if($feedback->url != null)
                                                        <tr>
                                                            <td>URL</td>
                                                            <td>{{$feedback->url}}</td>
                                                        </tr>
                                                    @endif
                                                </table>

                                                <h5>Details : </h5>
                                                <div class="mailbox-read-message">
                                                    {!! $feedback->description !!}
                                                </div>
                                            </div>


                                            @if($feedback->attachment != null || $feedback->attachment != '')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong>{{trans('संलग्न फाइल')}}</strong></p>

                                                        <div class="box-footer">
                                                            <div class="mailbox-attachments clearfix">
                                                                <?php
                                                                $arr = json_decode($feedback->attachment);
                                                                $i = 1;
                                                                ?>
                                                                <table class="table table-stribe table-bordered table-responsive">
                                                                    <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">{{trans('app.sn')}}</th>
                                                                        <th>File / Attachment</th>
                                                                        <th>Size</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($arr as $item)
                                                                        <tr>
                                                                            <td>{{$i}}</td>
                                                                            <td>
                                                                                <a href="{{URL::to('storage/uploads/feedback/'. $item)}}"
                                                                                   download="{{$item}}"
                                                                                   class="mailbox-attachment-name"><i
                                                                                            class="fa fa-paperclip"></i>
                                                                                    Document No. {{$i}}</a>
                                                                            </td>
                                                                            @if(file_exists('storage/uploads/feedback/' . $item))
                                                                                <td><?php echo FileSizeConvert(File::size('storage/uploads/feedback/' . $item));?></td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                        </tr>
                                                                        <?php $i++; ?>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection