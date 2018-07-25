@include("layouts.cabecera")
<link href="css/oferta.css" rel="stylesheet">
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif

    <div class="card-body">
    <h1> {{$mensaje}} <h1>
        <img width="100" src="{{asset('img/status/'.$check.'')}}">
    </div>

@include("layouts.pie")