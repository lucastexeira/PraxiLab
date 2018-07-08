@include("layouts.cabecera")
  <link href="css/estilosLogin.css" rel="stylesheet">
</head>
<body>
 
  @include("layouts.navbar")
  </br>
  <div class="container">
    <div class="col-md-12">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <div class="well">
              <div class="card-header"> 
                      <h1 class="text-center">Registro</h1>
              </div>
              <form method="" action="">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                <div class="card-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" maxlength="50" id="nombre" class="form-control" placeholder="Nombre" required="required" value=""/>
                        </div>

                         <div class="form-group">
                            <label for="contrasena">Apellido</label>
                            <input name="apellido" type="text" id="apellido" class="form-control" placeholder="Apellido" required="required" value="" />
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