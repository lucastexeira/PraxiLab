
	<! ========== NAVBAR =======================================================================================>


<nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href=" {{url('index/') }} ">
     
      @if(Session::has('notice'))
      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h2>{{ Session::get('notice') }}</h2>
      </div>
      @endif
      
      <a class="navbar-brand" href="{{url('index')}}">
        <img width="100" src="{{asset('img/logos/Logo blanco y negro transparente 2.png')}}" class="logo">
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
              <a class="dropdown-item" href="{{url('servicios/'.$rubro->id.'')}}">{{ $rubro->nombre_rubro }}</a>
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
                          <a class="dropdown-item" href="{{url('listadoPracticasEstados/')}}">
                            <span class=""></span>Práctica Solicitada(1)</a>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul\

              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <img src="" class="img-circle" alt="Usuario" height="50px" width="50px">
                    LucasT
                  </a>

                  <ul class="dropdown-menu">
              <li  class="nav-item dropdown">
                <div class="navbar-login">
                  <div class="row">
                    <div class="col-lg-12">
                      <a class="dropdown-item" href="{{url('perfil/')}}">
                        <span class="glyphicon glyphicon-user"></span> Ver Perfil</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <a class="dropdown-item" href="{{url('listadoPracticasEstados/')}}">
                          <span class="glyphicon glyphicon-cog"></span> Mis Prácticas</a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <a class="dropdown-item" href="{{url('transacciones/')}}">
                            <span class="fa fa-dollar"></span> Transacciones</a>
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

	</br></br></br></br>


