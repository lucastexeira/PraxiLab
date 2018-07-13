 @include("layouts.cabecera")
  </head>
 
  <body>
  <! ========== NAVBAR =======================================================================================>
 
  <nav id="menu" class="navbar navbar-expand-lg navbar-transparent bg-transparent fixed-top">
    <a class="navbar-brand" href=" {{ 'index' }} ">
 
    @if(Session::has('notice'))
       <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h2>{{ Session::get('notice') }}</h2>
      </div>
    @endif
    
    <a class="navbar-brand" href="index">
      <img width="100" src="img/logos/logo_negro_y_blanco_transparente.png" class="logo">
      <!--img width="80" src="img/logo.png" alt=""-->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Rubros 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($rubros as $rubro)
              <a class="dropdown-item" href="{{ $rubro->id }}">{{ $rubro->nombre_rubro }}</a>
            @endforeach
            
          </div>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar Practica" aria-label="Search">
      </form>

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <span class="glyphicon glyphicon-bell"></span>
      <!--img width="80" src="img/logo.png" alt=""-->
          </a>
          <ul class="dropdown-menu">
              <li  class="nav-item dropdown">
                  <div class="navbar-login">
                      <div class="row">
                          <div class="col-lg-12">
                              <a class="dropdown-item" href="{{ 'listadoPracticasEstados' }}">
                                <span class="glyphicon glyphicon-user"></span> Tenés una práctica nueva</a>
                          </div>
                      </div>
                  </div>
              </li>
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                <img src="img/team/profile-pics.jpg" class="img-circle" alt="Usuario" height="50px" width="50px">
                Nombre
              </a>

              <ul class="dropdown-menu">
                  <li  class="nav-item dropdown">
                      <div class="navbar-login">
                          <div class="row">
                              <div class="col-lg-12">
                                  <a class="dropdown-item" href="{{ 'perfil' }}">
                                    <span class="glyphicon glyphicon-user"></span> Ver Perfil</a>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <a class="dropdown-item" href="{{ 'listadoPracticasEstados' }}">
                                    <span class="glyphicon glyphicon-cog"></span> Prácticas y Transacciones</a>
                              </div>
                          </div>
                      </div>
                  </li>
                  <li class="divider"></li>
                  <li  class="nav-item dropdown">
                      <div class="navbar-login navbar-login-session">
                          <div class="row">
                              <div class="col-lg-12">
                                <a href="{{ 'logout' }}" class="dropdown-item">
                                <span class="glyphicon glyphicon-log-out"></span> Cerrar Sesion</a>
                                  
                              </div>
                          </div>
                      </div>
                  </li>
              </ul>
          </li>
      </ul>
 
      <!--ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ 'inicioSesion' }}">Iniciá Sesión <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ 'registro' }}">Registrate</a>
        </li>
      </ul-->
    </div>
  </nav>
 
    <div id="headerwrap">
    <div class="container">
      <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2 mt">
          <h1 class="animation slideDown">
            ¡No pierdas más tiempo! </br>La experiencia hace al profesional.
          </h1>
            <button id="verMas" type="button" class="btn btn-cta btn-lg">VER MÁS</button>
            <br>
            <br>
            
            <button style="border: 1px black solid; color: white; background-color: transparent!important;" type="button" class="button btn btn-theme btn-lg col-md-6" title="Realizá prácticas y adquirí experiencia">
              <i class="glyphicon glyphicon-usd" style="color: black"></i>
              </br> REALIZÁ UNA PRÁCTICA
              </br> ¡ganá experiencia!
            </button>
            
            <button style="border: 1px black solid; color: white; background-color: transparent!important;" type="button" class="button btn btn-theme btn-lg col-md-6" title="adquirí prácticas y ganá dinero">
              <i class="glyphicon glyphicon-list-alt" style="color: black"></i>
              </br>ADQUIRÍ UNA PRÁCTICA
              </br> ¡ganá dinero!
            </button>

        </div>
         
          <!--div class="col-md-6 centered si">
            <i class="glyphicon glyphicon-list-alt"></i>
            <h4><a class="button" href=" {{ 'abmPractica' }} ">¡Realizá prácticas y adquirí experiencia!</a></h4>
          </div>
          <div class="col-md-6 centered si">
            <i class="glyphicon glyphicon-usd"></i>
            <h4><a class="button" href=" {{ 'todosLosServicios' }} ">¡Adquirí un servicio y generá ingresos!</a></h4>
          </div--> 
      </div><!-- /row -->
      </div><!-- /container -->
    </div> <!-- /headerwrap -->
 
  <! ========== SERVICIOS RECOMENDADOS ==========================================================================>    
  <div class="container">  
  <div class="row mt centered ">
      <div class="col-lg-4 col-lg-offset-4">
        <h1>Prácticas Recomendadas</h1>
        <hr>
      </div>
    </div><!-- /row -->
 
    <div class="row mt">
      @foreach ($servicios as $servicio)
      <div class="col-lg-3 col-md-3 col-xs-12 desc">
        <a class="b-link-fade b-animate-go" href="#"><img width="250" height="180" 
        src="{{ $servicio->imagen }}" alt="{{ $servicio->nombre_servicio }}" />
          <div class="b-wrapper">
              <h4 class="b-from-left b-animate b-delay03">Ver más</h4>
          </div>
        </a>
        <p>$50 - {{ $servicio->nombre_servicio }}</p>
        <hr-d>
      </div>
      @endforeach
    </div><!-- /row -->
 
    <div class="row mt centered">
      <div class="col-lg-4 col-lg-offset-4">
          <a href=" {{ 'todosLosServicios' }} ">
          <button type="button" class="btn btn-theme btn-lg">TODAS LAS PRÁCTICAS</button>
          </a>
      </div>
    </div><!-- /row -->
 
  </div><!-- /container -->
 

  <! ========== RUBROS ======================================================================================>   
  <div class="container">

    <div class="row mt centered ">
      <div class="col-lg-4 col-lg-offset-4">
        <h1>Rubros</h1>
        <hr>
      </div>
    </div><!-- /row -->

      <section class="regular slider">

          @foreach ($rubros as $rubro)
            <div>
              <a data-toggle="modal" class="b-link-fade b-animate-go" href="servicios/{{ $rubro->id }}"  class="center-block"><img width="255" height="175" src="{{ $rubro->imagen }}" alt="" />
                <div class="b-wrapper">
                    <h4 >{{ $rubro->nombre_rubro }}</h4>
                    <p >VER MÁS</p>
                </div>
              </a>

              <h3 class="text-center">{{ $rubro->nombre_rubro }}</h3>
            </div>  
          @endforeach

      </section>

    

    <div class="row mt centered">
      <div class="col-lg-4 col-lg-offset-4">
          <a class="nav-link" href="{{ 'rubrosYServicios' }}">
            <button type="button" class="btn btn-theme btn-lg">RUBROS Y PRÁCTICAS</button>
          </a>
      </div>
    </div><!-- /row -->
  </div><!-- /container -->

  <!-- MODAL -->
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Lista de Servicios</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          @foreach ($servicios as $servicio)
            @if ($servicio->id_rubro === $rubro->id)
              <h3>{{ $servicio->nombre_servicio}}{{ $servicio->id_rubro}}</h3>
            @endif
          @endforeach
          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
          </div>
        </div>
        
      </div>
    </div>
  
</div>
 
  <! ========== NOSOTROS ===============================================================================================>    
  <div id="black">
    </br>
    <div class="container">
      <div class="row mt centered">
        <div class="col-lg-4 col-lg-offset-4">
          <h3>Nosotros</h3>
          <hr>
        </div><!-- /col-lg-4 -->
      </div><!-- /row -->

      <div class="row mt">
        <div class="col-lg-8 col-lg-offset-2">
          <p>Si bien los conocimientos académicos son un respaldo, actualmente en cualquier industria los reclutantes buscan perfiles con experiencia comprobable y contar con personas que lo validen, por eso PraxiLab te dá la oportunidad de que te capacites y te vuelvas un profesional.</p>
        </div>
      </div><!-- /row -->
    </div><!-- /container -->
  </div><!-- /black -->
 
 
  <! ========== PASOS A SEGUIR =========================================================================================>    
      <div class="container" id="comoFunciona">
        <div class="row mt">
          <div class="col-lg-4 col-lg-offset-4 centered">
            <h3>¡¿Cómo Funciona?!</h3>
            <hr>
          </div>
        </div>
        <div class="row mt">
          <div class="col-lg-4 centered si">
            <i class="glyphicon glyphicon-search"></i>
            <h4>Comunicación</h4>
            <p>Buscá y conectate con usuarios según tus necesidades.</p>
          </div>
          <div class="col-lg-4 centered si">
            <i class="glyphicon glyphicon-check"></i>
            <h4>Prácticas</h4>
            <p>Llevá a cabo el servicio programado. </p>
          </div>
          <div class="col-lg-4 centered si">
            <i class="glyphicon glyphicon-heart"></i>
            <h4>Reputación</h4>
            <p>Calificá al usuario.</p>
          </div>      
        </div><!-- /row -->
      </div><!-- /container -->


  <script>
    $(window).scroll(function() {
      if ($("#menu").offset().top > 190){
        $("#menu").removeClass("bg-transparent");
        $("#menu").addClass("bg-dark");
        $(".logo").attr('src', 'img/logos/LogoColorTransparente.png');
        $("#menu").addClass("bg-dark");
        
      } else {
        $("#menu").removeClass("bg-dark");
        $(".logo").attr('src', 'img/logos/logo_negro_y_blanco_transparente.png');
        }
        });
 
 
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
 
    });
  </script>
    @include("layouts.pie")