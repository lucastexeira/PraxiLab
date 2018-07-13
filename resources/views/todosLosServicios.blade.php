@include("layouts.cabecera");


<!--Estilo de la lista de practicas-->
<link href="{{asset('css/usuariosPorServicio.css')}}" rel="stylesheet">
</head>
<body>
 
  @include("layouts.navbar");
  
  <div class="container">
    <div class="row mt centered ">
      <div class="col-lg-4 col-lg-offset-4">
        <h1>Todas las Prácticas</h1>
        <hr>
      </div>
    </div><!-- /row -->
 
    <div class="row mt ">
 
      <form class="col-lg-3" action="{{ 'todosLosServicios' }}" method="GET"> 
          <span><i class="nav-icon-search"></i></span><input class="form-control" type="search" placeholder="Nombre de la practica" aria-label="Search" id="buscador" name="buscador" >
          <!--button type="button" class="btn btn-cta btn-lg" style="background-color: #9244a4">Buscar</button-->
        </form>
 
      <div class="col-lg-3">
        <select class="form-control" id="select">
          <option value="">Seleccionar Rubro</option>
          @foreach ($rubros as $rubro)
            <option value="{{ $rubro->id }}">{{ $rubro->nombre_rubro }}</option>
          @endforeach
          
        </select>
      </div>
      </div>
 
    <div class="row">


      @foreach ($pracPers as $pracPer)
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="thumbnail img-thumb-bg" style="background-image: url({{asset($pracPer->imagen_practica)}})">
            <div class="overlay"></div>
                    <div class="caption">
                        <div class="title"><a href="#">{{ $pracPer->nombre_practica }}</a></div>
                        <div class="clearfix">
                          <span class="tag" ><font color="white"><h2>Usuario: <a href="{{url('perfil/')}}">{{ $pracPer->nombre }}</a></h2></font></span>
                            <span class="meta-data"><font color="white"><h2>Calificación: <i class="fa fa-star-o"></i> 5     Oferta: <i class="fa fa-dollar"></i> 50</h2></font></span>
                            <span class="meta-data"><font color="white"></font></span>
                        </div>
                        <div class="content">
                           <p>{{ $pracPer->descripcion }}</p>
                        </div>
                    </div>
                </div>

        </div>
      @endforeach
 
      <!--@foreach ($buscador as $servicio)
      <div class="col-lg-3 col-md-3 col-xs-12 desc">
        
        <a class="b-link-fade b-animate-go" href="{{ 'oferta' }}"><img width="250" height="180" src="{{ $servicio->imagen }}" alt="{{ $servicio->nombre_servicio }}" />
          <div class="b-wrapper">
              <h4 class="b-from-left b-animate b-delay03">Ver más</h4>
          </div>
        </a>
        <p>$50 - {{ $servicio->nombre_servicio }}</p>
        <hr-d>
      </div>
      @endforeach
    </div><!-- /row -->
  </div>
</div>
<footer>

@include("layouts.pie")