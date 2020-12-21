<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.add')}}&nbsp;</h3>

    </div>
    <div class="box-body">
    {!! Form::open(['method'=>'post','enctype' => 'multipart/form-data','url'=>'/backend/carousel']) !!}


    <!-- /.input group -->

        <div class="form-group {{ ($errors->has('carousel_image'))?'has-error':'' }}">
            <label>Carousel Image
                <label class="text-danger"> *</label>
            </label>
        {!! Form::file('carousel_image',null,['class'=>'form-control', 'name' => 'carousel_image']) !!}
        {!! $errors->first('carousel_image', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('status'))?'has-error':'' }}">
            <label for="status">Status
                <label class="text-danger"> *</label>
            </label><br>
            {{--<label for="item_type" class="control-label align">Item Type<label class="text-danger"> *</label></label><br>--}}
            {{Form::radio('status', '1','true',['class'=>'flat-red'])}}&nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;
            {{Form::radio('status', '0',null,['class'=>'flat-red'])}}&nbsp;&nbsp;Inactive
            {!! $errors->first('status', '<span class="text-danger">:message</span>') !!}
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