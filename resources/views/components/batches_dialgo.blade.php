








<!-- MODAL -->
<div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"><b>Add Batch</b><button type="button" class="close" data-dismiss="modal">&times;<h4></h4></button></div>
            <div class="modal-body">

                {!! Form::open(array('role'=>'form','class'=>'form-horizontal','name'=>'frmBatch', 'id' => 'frmBatch'))!!}

                <div class="form-group">
                    {!! Form::label('application','Application',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('application','Interest Auction Results',['class'=>'form-control','required','readonly']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('jobnumber','Job Number',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('jobnumber',null,['class'=>'form-control','pattern'=>'[0-9]{4}', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('job_name','Job Name',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::select('job_name', ['Interest Auction Results'=>'Interest Auction Results'], null, ['class'=>'form-control','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('batch_date','Date',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('batch_date',null,['class'=>'form-control','placeholder'=>'dd/mm/yyyy','pattern'=>'^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('job_status','Status',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::select('job_status', ['Open'=>'Open','Closed'=>'Closed','Pending'=>'Pending'], null, ['class'=>'form-control','pattern'=>'[aA-zZ]{1,25}']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('records','Records',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('records',null,['class'=>'form-control','pattern'=>'[0-9]']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('remarks','Remarks',['class'=>'control-label col-sm-4']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('remarks',null,['class'=>'form-control','pattern'=>'[aA-zZ]']) !!}
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save</button>
                        <input type="hidden" id="batch_id" name="batch_id" value="0">
                    </div>
                </div>

                {!! Form::close() !!}
            </div> <!-- end of modal body -->
        </div> <!-- end of modal content -->
    </div> <!-- end of modal dialog -->
</div> <!-- end of modal -->