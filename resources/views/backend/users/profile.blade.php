@extends('backend.layouts.app')
@section('title','User-Profile')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">User</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            @include('backend.message.flash')
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="{{url('dashboard')}}" class="pull-right" data-toggle="tooltip" title="Go Back"><i
                                class="fa fa-arrow-circle-left fa-2x"></i></a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <a data-toggle="modal" data-target="#myModal">
                                        @if($user->user_image!=null)
                                            <img class="profile-user-img img-responsive img-circle"
                                                 src="{{asset('/storage/uploads/users/images/profilePic/'.$user->user_image)}}"
                                                 alt="User Image">
                                        @else
                                            <img class="profile-user-img img-responsive img-circle"
                                                 src="{{url('/uploads/images/dummyUser.gif')}}"
                                                 alt="User Image">
                                        @endif
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Profile Picture</h4>
                                                </div>
                                                <form action="{{url('/profile/profilePic')}}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="file" name="user_image" id="profile-img" ><br>
                                                        <img src="" id="profile-img-tag" width="300px" />
                                                        {{csrf_field()}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="profile-username text-center">{{$user->name}}</h3>

                                    <p class="text-muted text-center">{{$user->designation->designation_name}}</p>

                                </div>
                            </div>
                            <!-- /.box -->

                            <!-- About Me Box -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">About Me</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                                    <p class="text-muted">
                                        {{$user->email}}
                                    </p>
                                    <hr>
                                    <strong><i class="fa fa-sign-in margin-r-5"></i> Last Logged in</strong>
                                    <p class="text-muted" style="float:right">
                                        <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($lastLogin))->diffForHumans() ?>
                                    </p>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li id="settings_li" class="active">
                                        <a href="#settings" data-toggle="tab" id="setting_tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content active">
                                    <div class="tab-pane active" id="settings">
                                        <form id="myform" class="form-horizontal" action="{{url('/profile/password')}}" method="post">
                                            <div class="form-group {{ ($errors->has('old'))?'has-error':''}}">

                                                <label for="old" class="col-sm-3 control-label">Old password</label>
                                                <div class="col-sm-6">
                                                    <input type="password" name="old" class="form-control" id="old"
                                                           placeholder="Enter old password">
                                                    {!! $errors->first('old', '<span class="text-danger">:message</span>') !!}

                                                </div>
                                            </div>
                                            <div class="form-group {{ ($errors->has('password'))?'has-error':''}}">
                                                <label for="new" class="col-sm-3 control-label">New password</label>

                                                <div class="col-sm-6">
                                                    <input name="password" type="password" class="form-control" id="new"
                                                           placeholder="Enter new Password">
                                                    {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm" class="col-sm-3 control-label">Confirm password</label>

                                                <div class="col-sm-6">
                                                    <input name="password_confirmation" type="password" class="form-control" id="confirm"
                                                           placeholder="Confirm Password">
                                                </div>
                                            </div>
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')

    <script>

        $(document).ready(function () {
            //navigation bar
            $(".nav li a").click(function () {
                var id = $(this).attr("id");

                localStorage.setItem("selectedolditem", id);
            });
            var selectedolditem = localStorage.getItem('selectedolditem');

            if (selectedolditem != null) {
                if (selectedolditem === 'setting_tab') {
                    $('#activity').removeClass("active selected");
                    $('#activity_li').removeClass("active selected");
                    $('#settings_li').addClass('active selected ');
                    $('#settings').addClass('active selected ');
                }

            }

        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function(){
            readURL(this);
        });
    </script>
@endsection
