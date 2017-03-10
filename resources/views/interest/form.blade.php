    <legend>{{ session('batch_name') }}</legend>    

    {!! Form::token() !!}
  
    {!! Form::hidden('batch_name',session('batch_name'),['class'=>'form-control input-sm', 'required','readonly']) !!}
    {!! Form::hidden('status',$status,['class'=>'form-control input-sm', 'required','readonly']) !!}

    <div class="form-group">
      {!! Form::label('state','State',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-1 col-sm-1 col-xs-2 custom">
        {!! Form::text('state',null,['class'=>'form-control input-sm', 'readonly']) !!}
      </div>
    </div>
    
    <div class="form-group">  
      {!! Form::label('listing_id','Listing ID',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-3 col-sm-3 col-xs-4 custom">
        {!! Form::text('listing_id',null,['class'=>'form-control input-sm', 'autofocus'=>'true', 'pattern'=>'[aA-zZ0-9-]{1,15}', 'required']) !!}
      </div>
    </div>
    
    <div class="form-group">  
      {!! Form::label('unit_no','Unit No.',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-3 col-sm-3 col-xs-4 custom">
        {!! Form::text('unit_no',null,['class'=>'form-control input-sm', 'pattern'=>'[0-9aA-zZ-\.]{1,20}']) !!}
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('street_no','Street No.',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-3 col-sm-3 col-xs-4 custom">
        {!! Form::text('street_no',null,['class'=>'form-control input-sm', 'pattern'=>'[0-9aZ-zZ-.]{1,25}', 'required']) !!}
      </div>
      <div class="col-md-1 col-sm-1 col-xs-2 custom">
        {!! Form::text('street_no_suffix',null,['class'=>'form-control input-sm','pattern'=>'[aA-zZ]{1}']) !!}
      </div>    
    </div>
    
    <div class="form-group">
      {!! Form::label('street_name','Street Name',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-4 col-sm-4 col-xs-6 custom">
        {!! Form::text('street_name',null,['class'=>'form-control input-sm', 'required', 'pattern'=>'[aA-zZ0-9\s\'\.\-/&/]{1,25}', 'required']) !!} 
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2 custom">
        {!! Form::select('street_ext', $street_extension, null, ['class'=>'form-control input-sm','placeholder'=>'--']) !!}
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2 custom">
        {!! Form::text('street_direction',null,['class'=>'form-control input-sm', 'pattern'=>'(North|South|East|West)']) !!}
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('suburb','Suburb',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-4 col-sm-6 col-xs-6 custom">
        {!! Form::text('suburb',null,['class'=>'form-control input-sm', 'pattern'=>'[aA-zZ\s\'\.\-]{1,25}', 'required']) !!}
      </div>
      <div class="col-md-2 col-sm-2 col-xs-3 custom">
        {!! Form::text('post_code',null,['class'=>'form-control input-sm', 'pattern'=>'[0-9]{4}', 'readonly']) !!}
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('property_type','Property Type',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-3 col-sm-3 col-xs-4 custom">
        {!! Form::text('property_type',null,['class'=>'form-control input-sm', 'required','readonly']) !!}
      </div>
      {!! Form::label('sale_type','Sale Type',['class'=>'control-label col-md-2 col-sm-2 col-xs-2']) !!}
      <div class="col-md-3 col-sm-3 col-xs-4 custom">
        {!! Form::select('sale_type', $sale_type, null, ['class'=>'form-control input-sm']) !!}
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('sold_price','Sold Price',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-3 col-sm-6 col-xs-6 custom">
        {!! Form::text('sold_price',null,['class'=>'form-control input-sm']) !!}
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('agency_name','Agency Name',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-5 col-sm-8 col-xs-6 custom">
        {!! Form::text('agency_name',null,['class'=>'form-control input-sm', 'pattern'=>'[aA-zZ0-9\s\'\.\-/&/]{1,100}', 'required']) !!}
      </div>
    </div>
    
    <div class="form-group">  
      {!! Form::label('contract_date','Contract Date',['class'=>'control-label col-md-3 col-sm-2 col-xs-2 aussie_date']) !!}
      <div class="col-md-3 col-sm-3 col-xs-4 custom">
        {!! Form::text('contract_date',null,['class'=>'form-control input-sm aussie_date', 'pattern'=>'^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$']) !!}
      </div>
      {!! Form::label('settlement_date','Settlement Date',['class'=>'control-label col-md-2 col-sm-2 col-xs-2']) !!}
      <div class="col-md-2 col-sm-2 col-xs-4 custom">
        {!! Form::text('settlement_date',null,['class'=>'form-control input-sm', 'pattern'=>'', 'readonly']) !!}
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('bedroom','Bed',['class'=>'control-label col-md-3 col-sm-2 col-xs-2']) !!}
      <div class="col-md-1 col-sm-1 col-xs-2 custom">
          {!! Form::text('bedroom',null,['class'=>"form-control input-sm", 'pattern'=>'[0-9-]{1,2}', 'readonly']) !!}
      </div>
      {!! Form::label('bath','Bath',['class'=>'control-label col-md-1 col-sm-2 col-xs-2']) !!}
      <div class="col-md-1 col-sm-1 col-xs-2 custom">
          {!! Form::text('bathroom',null,['class'=>'form-control input-sm', 'pattern'=>'[0-9]{1,2}', 'readonly']) !!}
      </div>
      {!! Form::label('car','Car',['class'=>'control-label col-md-1 col-sm-2 col-xs-2']) !!}
      <div class="col-md-1 col-sm-1 col-xs-2 custom">
          {!! Form::text('car',null,['class'=>'form-control input-sm', 'pattern'=>'[0-9-]{1,2}', 'readonly']) !!}
      </div>
    </div>
    <hr>
    <div class="form-group">
      <div class="col-md-1 col-md-offset-3 col-sm-1 col-xs-2 custom">
          <button type="submit" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-check"></span>  Submit</button>
      </div>
    </div>

    @if($errors->any())
      <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    @endif