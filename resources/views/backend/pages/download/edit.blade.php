<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="box-body">
        {!! Form::model($edits,['method'=>'PUT','enctype' => 'multipart/form-data', 'route' => ['download.update', $edits->id]]) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title',null,['class'=>'form-control', 'name' => 'title']) !!}
        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('download_file'))?'has-error':'' }}">
            <label>File
                <label class="text-danger"> *</label>
            </label>
        {!! Form::file('download_file',null,['class'=>'form-control', 'name' => 'download_file']) !!}
        {!! $errors->first('download_file', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>


        <!-- /.form group -->
        <div class="box-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">{{trans('app.update')}}</button>
            </div>
            <!-- /.box-footer -->
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.box-body -->
</div>