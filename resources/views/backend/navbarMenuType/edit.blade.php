<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="box-body">
    {!! Form::model($edits,['method'=>'PUT','enctype' => 'multipart/form-data', 'route' => ['navbarMenuType.update', $edits->id]]) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('menu_type_name'))?'has-error':'' }}">
            <label>Menu Type Name
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('menu_type_name',null,['class'=>'form-control','placeholder' => 'Eg: Module, page', 'name' => 'menu_type_name']) !!}
        {!! $errors->first('menu_type_name', '<span class="text-danger">:message</span>') !!}
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