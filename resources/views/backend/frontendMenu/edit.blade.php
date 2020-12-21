<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="box-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['menu.update',$edits->id]]) !!}


        <div class="form-group {{ ($errors->has('link_name'))?'has-error':'' }}">
            <label>Link Name
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('link_name',null,['class'=>'form-control','placeholder' => 'Example: Chief Commisioner', 'name' => 'link_name']) !!}
        {!! $errors->first('link_name', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('link_url'))?'has-error':'' }}">
            <label>Link URL
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('link_url',null,['class'=>'form-control','placeholder' => 'Example: CC', 'name' => 'link_url']) !!}
            {!! $errors->first('link_url', '<span class="text-danger">:message</span>') !!}

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