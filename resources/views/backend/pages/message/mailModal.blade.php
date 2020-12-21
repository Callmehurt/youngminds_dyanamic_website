<div class="modal fade" id="mailModal-{{$value->id}}" tabindex="-1" aria-labelledby="mailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Reply</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            {!! Form::open(['method'=>'post','enctype' => 'multipart/form-data','url'=>'/backend/send-mail']) !!}

                <input type="text" value="{{$value->email}}" name="email" hidden>
            <!-- /.input group -->
                <div class="form-group">
                    <label>Title
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::text('title',null,['class'=>'form-control', 'name' => 'title']) !!}
                <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label>Message
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::textarea('message',null,['class'=>'form-control','name' => 'message']) !!}
                <!-- /.input group -->
                </div>

                <!-- /.form group -->
                <div class="box-footer">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                    <!-- /.box-footer -->

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>