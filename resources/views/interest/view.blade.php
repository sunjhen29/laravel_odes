@extends('layouts.dataentry.dataentry',['title'=>'Interest Auction Results'])

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><strong>{{ $results->batch_date }}</strong></h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>#</th>
              <th>Listing Id</th>
              <th>Property Address</th>
              <th>Sale Type</th>
              <th class="text-right">Sold Price</th>
              <th class="text-center">Contract Date</th>
              <th>Agency Name</th>
              <th class="text-center">Action</th>
            </tr>
            @foreach ($results->interests as $result)
              <tr>
                <td>{{ $result->address }}</td>
                <td>{{ $result->id }}</td>
                <td>{{ $result->listing_id }}</td>
                <td><a><b>{{ $result->unit_no }} {{ $result->unit_no != '' ? '/' : '' }} {{ trim($result->street_no).' '.$result->street_no_suffix.' '.$result->street_name.' '.$result->street_ext.' '.$result->street_direction.' '.$result->suburb }}</b></a></td>
                <td>{{ $result->sale_type }}</td>
                <td class="text-right">{{ $result->sold_price }}</td>
                <td class="text-center">{{ $result->contract_date }}</td>
                <td>{{ $result->agency_name }}</td>
                <td class="text-center">
                  <a href="{{ url('/interest/modify/'.$result->id) }}" class="btn btn-info btn-xs">Modify</a></button>
                  <a class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $result->id }}">Delete</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <strong><span>{{ count($results) != 0 ? count($results->interests).' Record(s) Found' : '0 Record' }}</span></strong>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</div> <!-- end of container -->

<div id="delete-modal" class="modal modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Confirmation Dialog</h4>
        </div>
        <form class="form-horizontal" action="/interest/delete" method="post">
          <div class="modal-body">
              <h4>Are you sure you want to delete?</h4>
              {{ csrf_field() }}
              <input name="delete_id" id="delete_id" type="hidden" value="" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-outline">Delete</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<!-- /.example-modal -->









@endsection
