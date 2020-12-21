<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="box-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['department.update',$edits->id]]) !!}


        <div class="form-group {{ ($errors->has('department_name'))?'has-error':'' }}">
            <label>{{trans('app.department')}} {{trans('app.name')}}
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('department_name',null,['class'=>'form-control','placeholder' => 'Example: Chief Commisioner']) !!}
            {!! $errors->first('department_name', '<span class="text-danger">:message</span>') !!}
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