	
	@include("layouts.cabecera")
	
</head>
<body>

	@include("layouts.navbar");

	<div class="row">
		<div class="container">
			<div class="col-md-8 centered">
				<h2 class="text-center">Iniciar Sesión</h2>
				<form action="logica\confirm.php" method="POST" id="registro-form">
					
					<div class="form-group centered">
						<label for="mail">E-Mail</label>
						<input type="email" class="form-control" id="mail" name="mail" placeholder="E-Mail" required="required">
					</div>
					<div class="form-group centered">
						<label for="password">Contrase&ntilde;a</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" required="required">
					</div>
					<div class="col-md-12 centered">
						<a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
						<input type="submit" class="btn btn-success" id="btnConfirmar" value="Confirmar"></input>
					</div>
					
				</form>
			</div>
		</div>
	</div>

	@include("layouts.pie");