@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-10">
    <h3><b>Export : Interest Auction Results</b></h3>
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-md-offset-0">
    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-inline" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="job_name">Job Name</label>
              <select class="form-control" id="job_name" name="job_name">
                <option>Interest Auction Results</option>
              </select>
          </div>
                        
          <div class="form-group">
            <label for="job_date">Batch Date</label>
              <input type="text" class="form-control" id="job_date" name="job_date" size="13" value="{{ $default_date }}" required>
          </div>
          <button type="submit" class="btn btn-primary">View Batches</button>

        </form> <!-- end of master form-->                
      </div> <!-- end of panel body-->
    </div> <!-- end of class panel-->
  </div> <!-- end of col-->
</div> <!-- end of row-->


<div class="row">
  <div class="col-md-12">
    @if($results)
    <a href="{{ url('/admin/export/interest/'.$batch->id) }}"><button type="button" class="btn btn-success pull-right btn-md">Export to CSV</button></a>
    <table class="table table-bordered table-hover">
      <thead style="background:#006080;color:white">
        <tr>
          <th>Batch Name</th>
          <th>Records</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
          @foreach($results as $result)
            <tr>
              <td>{{ $result->batch_name }}</td>
              <td>{{ $result->records }}</td>
              <td></td>
            </tr>
          @endforeach
            <tr>
              <td>Total : </td>
              <td>{{ $results->sum('records') }}</td>
              <td></td>
            </tr>
      </tbody>
    </table>
    @endif
  </div> <!-- end of col-->
</div> <!-- end of row-->
</div><!-- end of container -->
@endsection



@push('scripts')
<script>

  
</script>
@endpush
