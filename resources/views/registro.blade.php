	
	@include("layouts.cabecera")
	
</head>
<body>

	@include("layouts.navbar")

	<div class="row">
		<div class="container">
			<div class="col-xs-12">
				<h2 class="text-center">Registro de usuario</h2>
				<form action="logica\confirm.php" method="POST" id="registro-form">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="nombre">Nombre y Apellido</label>
							
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" required="required" <?php if (isset($_SESSION["nombre"]) and $_SESSION["nombre"]!='') {echo 'value="'.$_SESSION["nombre"].'"'; $_SESSION["nombre"]='';} ?> >
						</div>
						<div class="form-group">
							<label for="telefono">Tel&eacute;fono</label>
							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tel&eacute;fono" required="required" <?php if (isset($_SESSION["telefono"]) and $_SESSION["telefono"]!='') {echo 'value="'.$_SESSION["telefono"].'"'; $_SESSION["telefono"]='';} ?> >
						</div>
						<div class="form-group">
							<label for="fechaNacimiento">Fecha de nacimiento</label>
							<input type="text" class="form-control birthdate" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de nacimiento" required="required" <?php if (isset($_SESSION["fechaNacimiento"]) and $_SESSION["fechaNacimiento"]!='') {echo 'value="'.$_SESSION["fechaNacimiento"].'"'; $_SESSION["fechaNacimiento"]='';} ?> >
						</div>
						<div class="form-group">
							<label for="sexo">Sexo</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="sexo" class="sexo" value="M" <?php if ( !isset($_SESSION["sexo"]) or $_SESSION["sexo"]=='' or $_SESSION["sexo"]=='M') {echo 'checked="checked"'; $_SESSION["sexo"]='';} ?> >M
							</label>
							<label class="radio-inline">
								<input type="radio" name="sexo" class="sexo" value="F" <?php if (isset($_SESSION["sexo"]) and $_SESSION["sexo"]=='F') {echo 'checked="checked"'; $_SESSION["sexo"]='';} ?> >F
							</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="mail">E-Mail</label>
							<input type="email" class="form-control" id="mail" name="mail" placeholder="E-Mail" required="required">
						</div>
						<div class="form-group">
							<label for="password">Contrase&ntilde;a</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" required="required">
						</div>
						<div class="form-group">
							<label for="confirmaPassword">Confirme contrase&ntilde;a</label>
							<input type="password" class="form-control" id="confirmaPassword" name="confirmaPassword" placeholder="Confirme contrase&ntilde;a" required="required">
						</div>
					</div>
					<div class="col-sm-12 centered">
						<a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
						<input type="submit" class="btn btn-success" id="btnConfirmar" value="Confirmar"></input>
					</div>
				</form>
			</div>
		</div>
	</div>

	@include("layouts.pie")