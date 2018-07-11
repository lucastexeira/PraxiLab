	
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
	                    <h1 class="text-center">Iniciar Sesión</h1>
	            </div>
	            @if(Session::has('error_message'))
	                {{ Session::get('error_message') }}
	            @endif
	            <form method="POST" action="login">
	            	{{ csrf_field() }}
		            <div class="card-body">
		                <div>
		                    <div class="form-group">
		                        <label for="mail">Mail</label>
		                        <input name="mail" type="mail" id="mail" class="form-control" placeholder="Mail" required="true"/>
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
<footer>
@include("layouts.pie")