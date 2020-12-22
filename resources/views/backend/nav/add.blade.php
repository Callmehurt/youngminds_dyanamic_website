<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.add')}}&nbsp;</h3>

    </div>
    <div class="box-body">
    {!! Form::open(['method'=>'post','url'=>'/backend/navbar/menus']) !!}


    <!-- /.input group -->

        <div class="form-group {{ ($errors->has('parent_id'))?'has-error':'' }}" id="parentSelect">
            <label>Parent Menu</label>
            {{Form::select('parent_id',$menusParentList->pluck('menu_name','id'),Request::get('parent_id'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'parent_id','placeholder'=>
            'Select Parent Name'])}}
            {!! $errors->first('parent_id', '<span class="text-danger">:message</span>') !!}

        </div>

        <div class="form-group {{ ($errors->has('menu_name'))?'has-error':'' }}">
            <label>Menu Name
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('menu_name',null,['class'=>'form-control','placeholder' => 'Eg: Home, Contact', 'name' => 'menu_name']) !!}
        {!! $errors->first('menu_name', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>


        <div class="form-group {{ ($errors->has('menu_type_id'))?'has-error':'' }}">
            <label>Menu Type</label>
            {{Form::select('menu_type_id',$navbarMenuTypes->pluck('menu_type_name','id'),Request::get('menu_type_name'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'menuTypeDropdown','placeholder'=>
            'Select Menu Type'])}}
            {!! $errors->first('menu_type_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('page_slug'))?'has-error':'' }}" id="pageDropdownBx">
            <label>Page</label>
            {{Form::select('page_slug',$pages->pluck('page_name','slug'),Request::get('page_slug'),['class'=>'form-control select2','style'=>'width:100%;','id'=>'pageDropdown','placeholder'=>
            'Select Page', 'name' => 'page_slug'])}}
            {!! $errors->first('page_slug', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('site_url'))?'has-error':'' }}" id="siteUrl">
            <label>Site URL
            </label>
        {!! Form::text('site_url',null,['class'=>'form-control','name' => 'site_url']) !!}
        {!! $errors->first('site_url', '<span class="text-danger">:message</span>') !!}
        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('module_url'))?'has-error':'' }}" id="moduleUrl">
            <label>Module URL
            </label>
        {!! Form::text('module_url',null,['class'=>'form-control','name' => 'module_url']) !!}
        {!! $errors->first('module_url', '<span class="text-danger">:message</span>') !!}
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

        <div class="form-group {{ ($errors->has('display_order'))?'has-error':'' }}">
            <label for="display_order">Order
                <label class="text-danger"> *</label>
            </label>
            {!! Form::number('display_order',null,['class'=>'form-control','placeholder'=>'Enter Menu Order', 'name' => 'display_order']) !!}
            {!! $errors->first('display_order', '<span class="text-danger">:message</span>') !!}
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

<script>
    const menuTypeDropdown = document.getElementById("menuTypeDropdown");
    const pageDropdown = document.getElementById("pageDropdownBx");
    const siteUrl = document.getElementById("siteUrl");
    const moduleUrl = document.getElementById("moduleUrl");
    const check = menuTypeDropdown.options[menuTypeDropdown.selectedIndex].text;
    if(check == "Page Menu"){
        pageDropdown.classList.remove('hidden');
    }else {
        pageDropdown.classList.add('hidden');
    }
    if(check == "URL Menu"){
        siteUrl.classList.remove('hidden');
    }else {
        siteUrl.classList.add('hidden');
    }
    if(check == "Module Menu"){
        moduleUrl.classList.remove('hidden');
    }else {
        moduleUrl.classList.add('hidden');
    }
    menuTypeDropdown.addEventListener('change', function () {
        const value = menuTypeDropdown.options[menuTypeDropdown.selectedIndex].text;
        if(value == "Page Menu"){
            pageDropdown.classList.remove('hidden');
        }else {
            pageDropdown.classList.add('hidden');
        }
        if(value == "URL Menu"){
            siteUrl.classList.remove('hidden');
        }else {
            siteUrl.classList.add('hidden');
        }
        if(value == "Module Menu"){
            moduleUrl.classList.remove('hidden');
        }else {
            moduleUrl.classList.add('hidden');
        }
    })

</script>

