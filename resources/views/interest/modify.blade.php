@extends('layouts.dataentry.dataentry',['title'=>'Interest Auction Results'])

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        
        {!! Form::model($record,array('role'=>'form','url'=>'/interest/'.$record->id.'/update','action'=>'POST','class'=>'form-horizontal'))!!}
            @include('interest.form',['status'=>$record->status])
        {!! Form::close() !!}
    </div><!-- end of column -->
</div> <!-- end of row -->    
</div> <!-- end of container -->
@endsection



