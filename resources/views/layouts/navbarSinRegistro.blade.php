<! ========== NAVBAR =======================================================================================>

	<nav id="menu" class="navbar navbar-expand-lg navbar-transparent bg-dark fixed-top" style="color: white">
		
	  <a class="navbar-brand" href="{{url('index')}}">
	  	<img width="100" src="{{asset('img/logos/LogoColorTransparente.png')}}" alt="">
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
	      <li class="nav-item active">
	        <a class="nav-link" href="{{ 'inicioSesion' }}">Iniciá Sesión <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ 'registro' }}">Registrate</a>
	      </li>
	    </ul>
	  </div>
	</nav>

	</br></br></br></br>

