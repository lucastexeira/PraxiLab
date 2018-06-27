	@include("layouts.cabecera")
  </head>

  <body>
	<! ========== NAVBAR =======================================================================================>

	<nav id="menu" class="navbar navbar-expand-lg navbar-transparent bg-transparent fixed-top">

		@if(Session::has('notice'))
		   <div class="alert">
			  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			  <h2>{{ Session::get('notice') }}</h2>
			</div>
		@endif
		
	  <a class="navbar-brand" href="index.php">
	  	PraxiLab
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
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscador</button>
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

    <div id="headerwrap">
    	<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2 mt">
					<h1 class="animation slideDown">
						¡No pierdas más tiempo! </br>La experiencia hace al profesional.
					</h1>
		    		<button id="verMas" type="button" class="btn btn-cta btn-lg">VER MÁS</button>
				</div>
 				
	    		<div class="col-md-6 centered si">
	    			<i class="glyphicon glyphicon-list-alt"></i>
	    			<h4>¡Realizá prácticas y adquirí experiencia!</h4>
	    		</div>
	    		<div class="col-md-6 centered si">
	    			<i class="glyphicon glyphicon-usd"></i>
	    			<h4>¡Adquirí un servicio y generá ingresos!</h4>
	    		</div> 
		    	
			</div><!-- /row -->
    	</div><!-- /container -->
    </div> <!-- /headerwrap -->

	<! ========== SERVICIOS RECOMENDADOS ==========================================================================>    
	<div class="container">	

		<div class="row mt centered ">
			<div class="col-lg-4 col-lg-offset-4">
				<h1>Servicios Recomendados</h1>
				<hr>
			</div>
		</div><!-- /row -->

		<div class="row mt">
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="img/portfolio/port04.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Ver más</h4>
					</div>
				</a>
				<p>Servicio 1</p>
				<p class="lead">Descripción del Servicio</p>
				<hr-d>
			</div>
			
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="img/portfolio/port04.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Ver más</h4>
					</div>
				</a>
				<p>Servicio 1</p>
				<p class="lead">Descripción del Servicio</p>
				<hr-d>
			</div>

			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="img/portfolio/port04.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Ver más</h4>
					</div>
				</a>
				<p>Servicio 1</p>
				<p class="lead">Descripción del Servicio</p>
				<hr-d>
			</div>
		</div><!-- /row -->

		<div class="row mt centered">
			<div class="col-lg-4 col-lg-offset-4">
    			<button type="button" class="btn btn-theme btn-lg">VER MÁS</button>
			</div>
		</div><!-- /row -->

	</div><!-- /container -->

	<! ========== CATEGORÍAS ======================================================================================>   
	<div class="container">
		<div class="row mt centered ">
			<div class="col-lg-4 col-lg-offset-4">
				<h1>Rubros</h1>
				<hr>
			</div>
		</div><!-- /row -->

		<div class="container-fluid container-articles">
			<div class="row articles">
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>
				<div class="col-md-2 article-img">
					<a class="b-link-fade b-animate-go" href="#"><img width="185" src="img/portfolio/port01.jpg" alt="" />
						<div class="b-wrapper">
						  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
						  	<p class="b-from-right b-animate b-delay03">View Details</p>
						</div>
					</a>
					<p>APE - <i class="fa fa-heart-o"></i></p>
				</div>

			</div>
		</div><!-- /row -->

		<div class="row mt centered">
			<div class="col-lg-4 col-lg-offset-4">
    			<button type="button" class="btn btn-theme btn-lg">RUBROS Y SERVICIOS</button>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->


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
	    			<h4>Servicios</h4>
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
			if ($("#menu").offset().top > 320){
				$("#menu").removeClass("bg-transparent");
				$("#menu").addClass("bg-dark");
			} else {
				$("#menu").removeClass("bg-dark");
				}
			});
	</script>

    @include("layouts.pie")
	
	