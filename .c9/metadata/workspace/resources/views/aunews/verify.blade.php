{"filter":false,"title":"verify.blade.php","tooltip":"/resources/views/aunews/verify.blade.php","undoManager":{"mark":11,"position":11,"stack":[[{"start":{"row":0,"column":0},"end":{"row":26,"column":8},"action":"remove","lines":["@extends('layouts.aunews')","","@section('content')","<div class=\"container-fluid\">","<div class=\"row\">","    <div class=\"col-md-6 col-md-offset-3\">","        {!! Form::open(array('role'=>'form','url'=>'/aunews/propdetails','method'=>'GET','class'=>'form-horizontal','id'=>'frmPropertyAddress'))!!}","          @include('aunews.formaddress')","        {!! Form::close() !!}","    </div><!-- end of column -->","</div> <!-- end of row -->    ","</div> <!-- end of container <-->","@endsection","","","@push('scripts')","<script>","$(document).ready(function(){","    $('#suburb').blur(function(){","        $.get('/aunews/postcode/' + $('#suburb').val(), function (data) {","            console.log(data.post_code);","            $('#post_code').val(data.post_code);","        }) ","    });","});","</script>","@endpush"],"id":2},{"start":{"row":0,"column":0},"end":{"row":27,"column":0},"action":"insert","lines":["@extends('layouts.aunews')","","@section('content')","<div class=\"container-fluid\">","<div class=\"row\">","    <div class=\"col-md-6 col-md-offset-3\">","        {!! Form::model($record,array('role'=>'form','url'=>'/aunews/'.$record->id.'/propdetails','method'=>'GET','class'=>'form-horizontal'))!!}","            @include('aunews.formaddress')","        {!! Form::close() !!}","    </div><!-- end of column -->","</div> <!-- end of row -->    ","</div> <!-- end of container -->","@endsection","","@push('scripts')","<script>","$(document).ready(function(){","    $('#suburb').blur(function(){","        $.get('/aunews/postcode/' + $('#suburb').val(), function (data) {","            console.log(data.post_code);","            $('#post_code').val(data.post_code);","        }) ","    });","});","</script>","@endpush","",""]}],[{"start":{"row":6,"column":69},"end":{"row":6,"column":70},"action":"insert","lines":["v"],"id":3}],[{"start":{"row":6,"column":70},"end":{"row":6,"column":71},"action":"insert","lines":["e"],"id":4}],[{"start":{"row":6,"column":71},"end":{"row":6,"column":72},"action":"insert","lines":["i"],"id":5}],[{"start":{"row":6,"column":72},"end":{"row":6,"column":73},"action":"insert","lines":["r"],"id":6}],[{"start":{"row":6,"column":72},"end":{"row":6,"column":73},"action":"remove","lines":["r"],"id":7}],[{"start":{"row":6,"column":71},"end":{"row":6,"column":72},"action":"remove","lines":["i"],"id":8}],[{"start":{"row":6,"column":71},"end":{"row":6,"column":72},"action":"insert","lines":["r"],"id":9}],[{"start":{"row":6,"column":72},"end":{"row":6,"column":73},"action":"insert","lines":["i"],"id":10}],[{"start":{"row":6,"column":73},"end":{"row":6,"column":74},"action":"insert","lines":["f"],"id":11}],[{"start":{"row":6,"column":74},"end":{"row":6,"column":75},"action":"insert","lines":["y"],"id":12}],[{"start":{"row":6,"column":75},"end":{"row":6,"column":76},"action":"insert","lines":["/"],"id":13}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":6,"column":76},"end":{"row":6,"column":76},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1480030292436,"hash":"2ba9f95b5a43da24d8f91237748be1b92af63a01"}