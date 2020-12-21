<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.add')}}&nbsp;</h3>

    </div>
    <div class="box-body">
        {!! Form::open(['method'=>'post','url'=>'configurations/fiscalYear']) !!}


        <div class="form-group {{ ($errors->has('fy_name'))?'has-error':'' }}">
            <label>Fiscal year name
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('fy_name',null,['class'=>'form-control','placeholder' => 'Enter fiscal year ']) !!}
            {!! $errors->first('fy_name', '<span class="text-danger">:message</span>') !!}
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('fy_start_date'))?'has-error':'' }}">
            <label>{{trans('app.startDate')}}
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('fy_start_date',null,['class'=>'form-control','id'=>'datepicker']) !!}
            {!! $errors->first('fy_start_date', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('fy_start_date_localized'))?'has-error':'' }}">
            <label>{{trans('app.startDateLocalize')}}</label>
            {!! Form::text('fy_start_date_localized',null,['class'=>'form-control','id'=>'datepicker3']) !!}
            {!! $errors->first('fy_start_date_localized', '<span class="text-danger">:message</span>') !!}
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('fy_end_date'))?'has-error':'' }}">
            <label>{{trans('app.endDate')}}
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('fy_end_date',null,['class'=>'form-control','id'=>'datepicker1']) !!}
            {!! $errors->first('fy_end_date', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('fy_end_date_localized'))?'has-error':'' }}">
            <label>{{trans('app.endDateLocalize')}} </label>
            {!! Form::text('fy_end_date_localized',null,['class'=>'form-control','id'=>'datepicker2']) !!}
            {!! $errors->first('fy_end_date_localized', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('fy_status'))?'has-error':'' }}">
            <label for="fy_status">{{trans('app.status')}} </label><br>
            {{Form::radio('fy_status', 'active',null,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('fy_status', 'inactive',true,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>
        <!-- /.form group -->
        <div class="box-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">{{trans('app.save')}}</button>
            </div>
            <!-- /.box-footer -->

        </div>
        {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

