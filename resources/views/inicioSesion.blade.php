	
	@include("layouts.cabecera")
	<link href="css/estilosLogin.css" rel="stylesheet">
</head>
<body>

	@include("layouts.navbar")
	</br>
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
	    	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	        <div class="well">
	            <div class="card-header">
	                <img src="img/bg01.jpg" class="profile-img" /> 
	                    <h3 class="text-center">Iniciar Sesión</h3>
	            </div>
	            @if(Session::has('error_message'))
	                {{ Session::get('error_message') }}
	            @endif
	            <form method="POST" action="login">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="card-body">
		                <div>
		                    <div class="form-group">
		                        <label for="mail">Nombre</label>
		                        <input name="mail" type="text" id="mail" class="form-control" placeholder="Nombre"/>
		                    </div>
		                    <div class="form-group">
		                        <label for="contrasena">Contraseña</label>
		                        <input name="contrasena" type="password" id="contrasena" class="form-control" placeholder="Contraseña" required="true"/>
		                    </div>

		                    <input type="submit" class="btn btn-primary btn-block" value="Confirmar"/>
		                </div>
		            </div>
	            </form>
	        </div>
	    </div>
	</div>

@include("layouts.pie")