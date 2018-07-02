	
	@include("layouts.cabecera")
	<link href="css/estilosLogin.css" rel="stylesheet">
</head>
<body>

	@include("layouts.navbar");
					
					<div class="container">
						<div class="col-md-12">
					    	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					        <div class="well">
					            <div class="card-header">
					                <img src="img/bg01.jpg" class="profile-img" /> 
					                    <h3 class="text-center">Registro</h3>
					            </div>
					            <form method="" action=" usuarioCreado/{{ $persona->id }}">
					            	<input type="hidden" name="_method" value="POST">
					            	<input type="hidden" name="_token" value="{{ csrf_field() }}">
						            <div class="card-body">
						                <div class="col-md-6">
						                    <div class="form-group">
						                        <label for="nombre">Nombre</label>
						                        <input name="nombre" type="text" maxlength="50" id="nombre" class="form-control" placeholder="Nombre" required="required" value="{{ $persona->nombre }}"/>
						                    </div>
						                    <div class="form-group">
						                        <label for="contrasena">Apellido</label>
						                        <input name="apellido" type="text" id="apellido" class="form-control" placeholder="Apellido" required="required" value="{{ $persona->apellido }}" />
						                    </div>
						                </div>
						                <div class="col-md-6">
						                    <div class="form-group">
						                        <label for="nombre">Mail</label>
						                        <input name="mail" type="mail" maxlength="50" id="mail" class="form-control" placeholder="E-mail" required="required" value="{{ $persona->mail }}"/>
						                    </div>
						                    <div class="form-group">
						                        <label for="contrasena">Contraseña</label>
						                        <input name="contrasena" type="password" id="contrasena" class="form-control" placeholder="Contraseña" required="required" value="{{ $persona->contrasena }}" />
						                    </div>
						                    <div class="form-group">
						                        <label for="telefono">Telefono</label>
						                        <input name="telefono" type="text" id="telefono" class="form-control" placeholder="Telefono" required="required" value="{{ $persona->telefono }}" />
						                    </div>
						                </div>
						                <input type="submit" class="btn btn-primary btn-block" value="Confirmar"/>
						            </div>
						        </form>
					        </div>
					    </div>
					    
					</div>

	@include("layouts.pie")