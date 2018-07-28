@include("layouts.cabecera")
<link href="css/oferta.css" rel="stylesheet">
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif

   <div class="container gallery-container">
		
        <div class="panel panel-default contenido">

			<div class="panel-heading">
                <div class="row mt centered ">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1>{{$mensaje}}</h1>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="experiencia-body panel-body">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <img class="center-block" src="{{asset('img/status/'.$check.'')}}">  
                    </div>
                </div> 
			</div>
          
		</div>  

	</div>
    <br>
    <br>
    <br>
    <br>
@include("layouts.pie")

