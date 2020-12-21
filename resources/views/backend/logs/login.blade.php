@extends('backend.layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Logs
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="#">Logs</a></li>
                <li class="active">Login Log</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')

            <div class="row">

                <div class="col-md-12" id="listing">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Login Log</h3>

                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">S.N</th>
                                    <th>User</th>
                                    <th>IP</th>
                                    <th>Device</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @forelse($logins as $login)
                                    <tr>
                                        <th scope=row>{{$i}}</th>
                                        <td>{{$login->user->name}}</td>
                                        <td>{{$login->log_in_ip}}</td>
                                        <td>{{$login->log_in_device}}</td>
                                        <td>{{$login->created_at->diffForHumans()}}</td>
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
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection