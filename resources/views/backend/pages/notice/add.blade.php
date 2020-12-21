<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.add')}}&nbsp;</h3>

    </div>
    <div class="box-body">
    {!! Form::open(['method'=>'post','enctype' => 'multipart/form-data','url'=>'backend']) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: Rinkey Bung Ko Ragolai..', 'name' => 'title']) !!}
        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('notice_date'))?'has-error':'' }}">
            <label>Notice Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('notice_date',null,['class'=>'form-control', 'name' => 'notice_date']) !!}
        {!! $errors->first('notice_date', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('notice_file'))?'has-error':'' }}">
            <label>Notice File
                <label class="text-danger"> *</label>
            </label>
        {!! Form::file('notice_file',null,['class'=>'form-control', 'name' => 'notice_file']) !!}
        {!! $errors->first('notice_file', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('notice_banner'))?'has-error':'' }}">
            <label>Notice Banner
                <label class="text-danger"> *</label>
            </label>
        {!! Form::file('notice_banner',null,['class'=>'form-control', 'name' => 'notice_banner']) !!}
        {!! $errors->first('notice_banner', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
            {!! Form::textarea('content',null,['class'=>'form-control edit_textarea','placeholder' => 'News Contents', 'name' => 'content']) !!}
            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}

        </div>

        <!-- /.form group -->
        <div class="box-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">{{trans('app.save')}}&nbsp;</button>
            </div>
            <!-- /.box-footer -->

        </div>

        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->