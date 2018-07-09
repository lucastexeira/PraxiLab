	
@include("layouts.cabecera");
<link href="{{asset('css/usuariosPorServicio.css')}}" rel="stylesheet">
</head>
<body>

@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    
		    <h1 class="typo">Servicios: {{ $servicio->nombre_servicio }}</h1>

			<ol>
				@foreach ($pracPers as $pracPer)
					

					<h4  class="center-block"><a href="#">{{ $pracPer->nombre }}</a></h4>

					<!-- Team member -->
			            <div class="col-xs-12 col-sm-6 col-md-4">
			                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
			                    <div class="mainflip">
			                        <div class="frontside">
			                            <div class="card">
			                                <div class="card-body text-center">
			                                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
			                                    <h4 class="card-title">{{ $pracPer->username }}</h4>
			                                    <p class="card-text">This is basic card with image on top, title, description and button.</p>
			                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="backside">
			                            <div class="card">
			                                <div class="card-body text-center mt-4">
			                                    <h4 class="card-title">Sunlimetech</h4>
			                                    <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
			                                    <ul class="list-inline">
			                                        <li class="list-inline-item">
			                                            <a class="social-icon text-xs-center" target="_blank" href="#">
			                                                <i class="fa fa-facebook"></i>
			                                            </a>
			                                        </li>
			                                        <li class="list-inline-item">
			                                            <a class="social-icon text-xs-center" target="_blank" href="#">
			                                                <i class="fa fa-twitter"></i>
			                                            </a>
			                                        </li>
			                                        <li class="list-inline-item">
			                                            <a class="social-icon text-xs-center" target="_blank" href="#">
			                                                <i class="fa fa-skype"></i>
			                                            </a>
			                                        </li>
			                                        <li class="list-inline-item">
			                                            <a class="social-icon text-xs-center" target="_blank" href="#">
			                                                <i class="fa fa-google"></i>
			                                            </a>
			                                        </li>
			                                    </ul>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
            		<!-- ./Team member -->

				@endforeach
			</ol>

		</div>
	</div>
</div>


@include("layouts.pie")

