{"filter":false,"title":"modify.blade.php","tooltip":"/resources/views/reanz/modify.blade.php","undoManager":{"mark":2,"position":2,"stack":[[{"start":{"row":8,"column":12},"end":{"row":8,"column":34},"action":"remove","lines":["@include('reanz.form')"],"id":2},{"start":{"row":8,"column":12},"end":{"row":9,"column":0},"action":"insert","lines":["",""]},{"start":{"row":9,"column":0},"end":{"row":9,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":8,"column":12},"end":{"row":9,"column":0},"action":"insert","lines":["",""],"id":3},{"start":{"row":9,"column":0},"end":{"row":9,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":9,"column":12},"end":{"row":13,"column":18},"action":"insert","lines":["@if(substr(session('batch_name'),13,-3) == 'S')    ","                @include('reanz.sale')","            @else(substr(session('batch_name'),13,-3) == 'R')","                @include('reanz.rent')","            @endif"],"id":4}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":13,"column":18},"end":{"row":13,"column":18},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1480734966717,"hash":"0ba009792763b99ed75ec9b6b36fd353e6cd133e"}