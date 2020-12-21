@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Carousel
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li class="active">Carousel</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')

            <div class="row">

                @if(helperPermission()['isAdd'])

                    <div class="col-md-9" id="listing">
                        @else
                            <div class="col-md-12" id="listing">
                                @endif
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Add Carousel</h3>
                                        <?php

                                        $permission = helperPermissionLink('carousel', 'carousel');

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                    </div>
                                    <div class="box-body">
                                        <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px;">{{trans('app.sn')}}</th>
                                                <th>Carousel Image</th>
                                                <th>Status</th>
                                                <th style="width: 10px" ;
                                                    class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1;?>
                                            @forelse($carousels as $carousel)
                                                <tr>
                                                    <th scope=row>{{$i}}</th>
                                                    <td>
                                                        <img src="{{ asset('uploads/carousel/'.$carousel->carousel_image) }}" alt="{{$carousel->carousel_image}}" style="height: 40px;width: 40px;object-fit: cover;object-position: center">

                                                    </td>
                                                    <td class="text-center">
                                                        @if($carousel->status== '1')
                                                            <a
                                                                    class="label label-success stat"
                                                                    href="{{url('/backend/carousel/'.$carousel->id)}}">
                                                                <strong class="stat"> Active
                                                                </strong>
                                                            </a>

                                                        @elseif($carousel->status== '0')
                                                            <a
                                                                    class="label label-danger stat"
                                                                    href="{{url('/backend/carousel/'.$carousel->id)}}">
                                                                <strong class="stat"> Inactive
                                                                </strong>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        @if($allowEdit)
                                                            <a href="{{route('carousel.edit', $carousel->id)}}"
                                                               class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                               data-placement="top" title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i>
                                                            </a>&nbsp;
                                                        @endif

                                                        @if($allowDelete)
                                                            {!! Form::open(['method' => 'post','route'=>['carousel.destroy', $carousel->id],'class'=> 'inline']) !!}
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"
                                                                    onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>

                                                            {!! Form::close() !!}
                                                        @endif

                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            @if($allowAdd)

                                <div class="col-md-3">
                                    @if(\Request::segment(4)=='edit')
                                        @include('backend.carousel.edit')
                                    @else
                                        @include('backend.carousel.add')
                                    @endif

                                </div>
                            @endif

                    </div>
            </div>
        </section>
    </div>
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replaceAll( 'edit_textarea' );
    </script>
@endsection