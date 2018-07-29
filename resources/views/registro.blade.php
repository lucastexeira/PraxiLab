@include("layouts.cabecera")
  <link href="css/estilosLogin.css" rel="stylesheet">
</head>
<body>
 
  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif
  </br>
  <div class="container">
    <div class="col-md-12">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <div class="well">
              <div class="card-header"> 
                      <h1 class="text-center">Registro</h1>
              </div>
              <form method="" action=" create/">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                <div class="card-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" maxlength="50" id="nombre" class="form-control" placeholder="Nombre" required="required" />
                        </div>

                         <div class="form-group">
                            <label for="contrasena">Apellido</label>
                            <input name="apellido" type="text" id="apellido" class="form-control" placeholder="Apellido" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="nombre">Mail</label>
                            <input name="mail" type="mail" maxlength="50" id="mail" class="form-control" placeholder="E-mail" required="required"/>
                        </div>
                            <input name="img" type="hidden" id="img" required="required" value="img/logos/logo_default.png"/>
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input name="contrasena" type="password" id="contrasena" class="form-control" placeholder="Contraseña" required="required"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="zona">Localidad</label>
                            <input name="zona" type="text" maxlength="50" id="zona" class="form-control" placeholder="Localidad" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <input name="provincia" type="text" id="provincia" class="form-control" placeholder="Provincia" required="required"/>
                        </div>
                        
                        <div class="form-group">
	                        <label for="pais">Pais</label>
	                        <input name="pais" type="text" id="pais" class="form-control" placeholder="Pais" required="required"/>
	                    </div>
	                    <div class="form-group">
	                        <label for="telefono">Telefono</label>
	                        <input name="telefono" type="text" id="telefono" class="form-control" placeholder="Telefono" required="required" />
	                    </div>
	                </div>
	                <input type="submit" class="btn btn-primary btn-block" value="Confirmar"/>
	            </div>
	        </form>
        </div>
    </div>
    
</div>

	
<footer>
  @include("layouts.pie")