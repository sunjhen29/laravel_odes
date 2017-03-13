@extends('layouts.admin.admin',['title'=>'Batches','icon'=> 'fa fa-pencil-square'])

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><strong>Interest Auction Results</strong></h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> Add New Record</button>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>App</th>
                        <th>Job Name</th>
                        <th>Batch Date</th>
                        <th>Status</th>
                        <th>Records</th>
                        <th>Remarks</th>
                        <th>Date Added</th>
                        <th>Export Date</th>
                        <th>Actions</th>
                    </tr>
                    <tbody id="batch-list" name="batch-list">
                    @foreach($batches as $batch)
                        <tr id="batch{{$batch->id}}">
                            <td>{{ $batch->id }}</td>
                            <td>{{ $batch->application }}</td>
                            <td>{{ $batch->job_name }}</td>
                            <td>{{ $batch->batch_date }}</td>
                            <td>{{ $batch->job_status }}</td>
                            <td>{{ $batch->records }}</td>
                            <td>{{ $batch->remarks }}</td>
                            <td>{{ $batch->add_date }}</td>
                            <td>{{ $batch->export_date }}</td>

                            <td>
                                <button class="btn btn-warning btn-xs btn-detail open-modal" data-toggle="modal" data-target="#myModal" value="{{$batch->id}}">Modify</button>
                                <button class="btn btn-danger btn-xs btn-delete delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $batch->id }}">Delete</button>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <!-- <strong><span></span></strong> -->
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><strong>Interest Auction Results</strong></h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> Add New Record</button>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table id="data_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Application</th>
                            <th>Job Name</th>
                            <th>Batch Date</th>
                            <th>Status</th>
                            <th>Records</th>
                            <th>Remarks</th>
                            <th>Date Added</th>
                            <th>Export Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($batches as $batch)
                        <tr id="batch{{$batch->id}}">
                            <td>{{ $batch->id }}</td>
                            <td>{{ $batch->application }}</td>
                            <td>{{ $batch->job_name }}</td>
                            <td>{{ $batch->batch_date }}</td>
                            <td>{{ $batch->job_status }}</td>
                            <td>{{ $batch->records }}</td>
                            <td>{{ $batch->remarks }}</td>
                            <td>{{ $batch->add_date }}</td>
                            <td>{{ $batch->export_date }}</td>

                            <td>
                                <button class="btn btn-warning btn-xs btn-detail open-modal" data-toggle="modal" data-target="#myModal" value="{{$batch->id}}">Modify</button>
                                <button class="btn btn-danger btn-xs btn-delete delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $batch->id }}">Delete</button>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
</div>

@include('components.batches',['application'=>'Interest Auction Results'])

@include('components.dialog',['dialog_type'=>'modal-danger','title'=>'Confirm','action'=>'/admin/batch/delete','message'=>'Are you sure you want to delete this record?'])

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    // ADD button ::
    $('#btn-add').click(function(){
        $('#frmBatch').trigger("reset");
        $('#myModal').modal('show');
    });
    // DELETE button ::
    $('.delete').click(function(){
        $('#delete_id').val($(this).data("id"));
    });

    // UPDATE button ::
    $('.open-modal').click(function(){
        $("#frmBatch").attr("action", "/admin/batch/" + $(this).val() + '/edit' );
        $.get('/admin/batch/' + $(this).val(), function (data) {
            console.log(data);
            $('#batch_id').val(data.id);
            $('#application').val(data.application);
            $('#jobnumber').val(data.jobnumber);
            $('#job_name').val(data.job_name);
            $('#batch_date').val(data.batch_date);
            $('#job_status').val(data.job_status);
            $('#remarks').val(data.remarks);
            $('.modal-title').html('Update Record');
            $('#btn-save').html("Update");
            $('#btn-save').val("update");
            $('#jobnumber').focus();
        })
    });
});
</script>
<script>
    $(document).ready(function(){
        var isCtrl = false;
        var isShift = false;

        $(window).keydown(function(e){
            if(e.keyCode == 17){
                isCtrl = true;
            }
            if(e.keyCode == 16){
                isShift = true;
            }
            if(e.keyCode == 65 && isCtrl == true && isShift == true){
                e.preventDefault();
                $('#btn-save').val("add");
                $('#frmBatch').trigger("reset");
                $('#btn-save').html("Save");
                $('#myModal').modal('show');
                $('#application').focus();
            }
        });

        $(window).keyup(function(e) {
            isCtrl = false;
            isShift = false;
            return;
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(function () {
            $("#data_table").DataTable();
        });
    });
</script>
@endpush
