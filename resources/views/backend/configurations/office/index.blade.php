@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{trans('app.configuration')}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('app.dashboard')}}</a></li>
                <li><a href="#">{{trans('app.configuration')}}</a></li>
                <li class="active">Office</li>
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
                                        <h3 class="box-title">Office</h3>
                                        <?php

                                        $permission = helperPermissionLink('municipality', 'municipality');

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
                                                <th>District Name</th>
                                                <th>Office Type Name</th>
                                                <th>Office Code</th>
                                                <th>Office Name</th>
                                                <th>Office Path</th>
                                                <th class="text-center">{{trans('app.status')}}</th>
                                                <th style="width: 10px" ;
                                                    class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1;?>
                                            @forelse($offices as $office)
                                                <tr>
                                                    <th scope=row>{{$i}}</th>
                                                    <td>{{$office->district->nepali_name}}</td>
                                                    <td>{{$office->officeType->office_type_name}}</td>
                                                    <td>{{$office->office_code}}</td>
                                                    <td>{{$office->office_name}}</td>
                                                    <td>{{$office->office_path}}</td>
                                                    <td class="text-center">
                                                        @if($office->office_status == 'active')
                                                            <a class="label label-success stat"
                                                               href="{{url('configurations/office/status',$office->id)}}">
                                                                <strong class="stat"> {{trans('app.active')}}
                                                                </strong>
                                                            </a>

                                                        @elseif($office->office_status == 'inactive')
                                                            <a class="label label-danger stat"
                                                               href="{{url('configurations/office/status',$office->id)}}">
                                                                <strong class="stat"> {{trans('app.inactive')}}
                                                                </strong>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        @if($allowEdit)
                                                            <a href="{{route('office.edit',[$office->id])}}"
                                                               class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                               data-placement="top" title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i>
                                                            </a>&nbsp;
                                                        @endif

                                                        @if($allowDelete)
                                                            {!! Form::open(['method' => 'DELETE', 'route'=>['office.destroy',
                                                                $office->id],'class'=> 'inline']) !!}
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
                                        @include('backend.configurations.office.edit')
                                    @else
                                        @include('backend.configurations.office.add')
                                    @endif
                                </div>
                            @endif

                    </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@endsection