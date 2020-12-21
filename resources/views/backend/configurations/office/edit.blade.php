<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Edit </h3>

    </div>
    <div class="box-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['office.update', $edits->id]]) !!}


        <div class="form-group {{ ($errors->has('district_id'))?'has-error':'' }}">
            <label>District Name</label>
            {{Form::select('district_id',$district->pluck('nepali_name','id'),Request::get('district_id'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'district_id','placeholder'=>
            'Select District Name'])}}
            {!! $errors->first('district_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('office_type_id'))?'has-error':'' }}">
            <label>Office Type Name</label>
            {{Form::select('office_type_id',$officeType->pluck('office_type_name','id'),Request::get('office_type_id'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'office_type_id','placeholder'=>
            'Select Office Type Name'])}}
            {!! $errors->first('office_type_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('office_code'))?'has-error':'' }}">
            <label>Office Code
            </label>
        {!! Form::text('office_code',null,['class'=>'form-control','placeholder' => 'Example:001']) !!}
        {!! $errors->first('office_code', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('office_name'))?'has-error':'' }}">
            <label>Office Name
            </label>
        {!! Form::text('office_name',null,['class'=>'form-control','placeholder' => 'Example:Name']) !!}
        {!! $errors->first('office_name', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('office_path'))?'has-error':'' }}">
            <label>Office Path
            </label>
        {!! Form::text('office_path',null,['class'=>'form-control','placeholder' => 'Example:Balaju']) !!}
        {!! $errors->first('office_path', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        <div class="form-group {{ ($errors->has('office_status'))?'has-error':'' }}">
            <label for="office_status">{{trans('app.status')}} </label><br>
            {{Form::radio('office_status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('office_status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>



        <!-- /.form group -->
        <div class="box-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {!! Form::close() !!}


    </div>

    <!-- /.box-body -->
</div>