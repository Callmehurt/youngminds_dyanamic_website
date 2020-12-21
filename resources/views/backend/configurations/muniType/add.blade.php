<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.add')}}&nbsp;</h3>

    </div>
    <div class="box-body">
    {!! Form::open(['method'=>'post','url'=>'configurations/muniType']) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('muni_type_name'))?'has-error':'' }}">
            <label>Municipality Type Name
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('muni_type_name',null,['class'=>'form-control','placeholder' => 'Example: Nagarpalika']) !!}
            {!! $errors->first('muni_type_name', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
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

