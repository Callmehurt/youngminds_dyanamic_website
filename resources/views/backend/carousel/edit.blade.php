<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="box-body">
    {!! Form::model($edits,['method'=>'PUT','enctype' => 'multipart/form-data', 'route' => ['carousel.update', $edits->id]]) !!}

        <div class="form-group {{ ($errors->has('carousel_image'))?'has-error':'' }}">
            <label>Carousel Image
                <label class="text-danger"> *</label>
            </label>
        {!! Form::file('carousel_image',null,['class'=>'form-control', 'name' => 'carousel_image']) !!}
        {!! $errors->first('carousel_image', '<span class="text-danger">:message</span>') !!}
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