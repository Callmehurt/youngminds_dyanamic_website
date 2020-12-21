<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="box-body">
    {!! Form::model($edits,['method'=>'PUT','enctype' => 'multipart/form-data', 'route' => ['event.update', $edits->id]]) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: Rinkey Bung Ko Ragolai..', 'name' => 'title']) !!}
        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('start_date'))?'has-error':'' }}">
            <label>Start Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('start_date',null,['class'=>'form-control', 'name' => 'start_date']) !!}
        {!! $errors->first('start_date', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('end_date'))?'has-error':'' }}">
            <label>End Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('end_date',null,['class'=>'form-control', 'name' => 'end_date']) !!}
        {!! $errors->first('end_date', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('venue'))?'has-error':'' }}">
            <label>Venue
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('venue',null,['class'=>'form-control','placeholder' => 'Example: Kathmandu', 'name' => 'venue']) !!}
        {!! $errors->first('venue', '<span class="text-danger">:message</span>') !!}
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
                <button type="submit" class="btn btn-primary">{{trans('app.update')}}</button>
            </div>
            <!-- /.box-footer -->
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.box-body -->
</div>