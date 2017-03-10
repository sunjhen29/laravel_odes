@extends('layouts.dataentry.dataentry')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <img src="img/user.jpg" class="img-responsive thumbnail" alt="San Fran" width="100%">
      <div class="list-group">
        <a href="{{ url('/dataentry') }}" class="list-group-item active"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
        <a href="{{ url('profile') }}" class="list-group-item"><i class="glyphicon glyphicon-user"></i> Profile</a>
        <a href="{{ url('/logout') }}" class="list-group-item"><i class="glyphicon glyphicon-off"></i> Log Out</a>
     </div>
    </div>
    <div class="col-sm-9">
      <div class="page-header">
        <h1>Dashboard</h1>
      </div>

      <div class="row">
         @foreach($applications as $application)
         <div class="col-sm-4">
           <!-- small box -->
           <div class="small-box bg-aqua">
             <div class="inner">
               <h3>10</h3>
                  <h4>{{ $application->application_name }}</h4>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
             <a href="{{ url($application->folder_path) }}" class="small-box-footer">Go To Application <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         @endforeach
      </div>
    </div>
  </div>

</div> <!-- end of container -->
@endsection
