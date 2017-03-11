@extends('layouts.admin.admin',['title'=>'Batches'])

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
                        <th>Job No.</th>
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
                            <td>{{ $batch->jobnumber }}</td>
                            <td>{{ $batch->batch_date }}</td>
                            <td>{{ $batch->job_status }}</td>
                            <td>{{ $batch->records }}</td>
                            <td>{{ $batch->remarks }}</td>
                            <td>{{ $batch->add_date }}</td>
                            <td>{{ $batch->export_date }}</td>

                            <td>
                                <button class="btn btn-warning btn-xs btn-detail open-modal" data-toggle="modal" data-target="#myModal" value="{{$batch->id}}">Modify</button>
                                <button class="btn btn-danger btn-xs btn-delete delete-batch" data-toggle="modal" data-target="#delete-modal" data-id="{{ $batch->id }}">Delete</button
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

@include('components.batches',['application'=>'Interest Auction Results'])

@include('components.confirm')

@endsection

@push('scripts')
<script>
$(document).ready(function(){
    var url = "{{ url('/admin/batch') }}";

    //Update :: display modal form for batch editing
    $('.open-modal').click(function(){
        var batch_id = $(this).val();
        $.get(url + '/' + batch_id, function (data) {
            //success data
            //console.log(data);
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
            //$('#myModal').modal('show');
        }) 
    });

    //Add :: display modal form for creating new batch
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmBatch').trigger("reset");
        $('#btn-save').html("Save");
        $('#myModal').modal('show');
        $('#jobnumber').focus();
    });



    //Delete ::
    $('.delete-batch').click(function(){
        $('#confirm').val($(this).data("id"));
    });

    $('#confirm').click(function(){
            var batch_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: url + '/' + batch_id,
                success: function (data) {
                    console.log(data);
                    $("#batch" + batch_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            $('#delete-modal').modal('hide');
    });


    //create new task / update existing task
    $("#frmBatch").submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        
        e.preventDefault();

        var formData = {
            jobnumber: $('#jobnumber').val(),
            application: $('#application').val(),
            job_name: $('#job_name').val(),
            batch_date: $('#batch_date').val(),
            job_status: $('#job_status').val(),
            remarks: $('#remarks').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var batch_id = $('#batch_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + batch_id + '/edit';
        }

        //console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#myModal').modal('hide')
                var batch = '<tr id="batch' + data.id + '"><td>' + data.id + '</td>';
                batch += '<td>' + data.application +'</td>';
                batch += '<td>' + data.job_name + '</td>';
                batch += '<td>' + data.jobnumber + '</td>';
                batch += '<td>' + data.batch_date + '</td>';
                batch += '<td>' + data.job_status + '</td>';
                batch += '<td>0</td>';
                batch += '<td>' + data.remarks + '</td>';
                batch += '<td>' + data.created_at + '</td><td></td>';
                batch += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" data-toggle="modal" data-target="#myModal" value="' + data.id + '">Modify</button>';
                batch += '<button class="btn btn-danger btn-xs btn-delete delete-batch" data-toggle="modal" data-target="#delete-model" data-id="' + data.id + '"> Delete</button></td></tr>';


                if (state == "add"){ //if user added a new record
                    $('#batch-list').append(batch);
                } else { //if user updated an existing record
                    $("#batch" + batch_id).replaceWith( batch );
                }
                $('#frmBatch').trigger("reset");
                
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    
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

@endpush
