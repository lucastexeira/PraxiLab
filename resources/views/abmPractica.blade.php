  
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
                      <h1 class="text-center">Crear nueva práctica</h1>
              </div>
              @if(Session::has('error_message'))
                  {{ Session::get('error_message') }}
              @endif
              <form method="POST" action="">
                {{ csrf_field() }}
                <div class="card-body">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rubro">Rubro</label>
                            <select class="form-control" id="id" name="id">
                              <option value="">Seleccionar Rubro</option>
                              @foreach ($rubros as $rubro)
                                <option value="{{ $rubro->id }}">{{ $rubro->nombre_rubro }}</option>
                              @endforeach
                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="servicio">Servicio</label>
                            
                            <select name="id_servicio" id="id_servicio" class="form-control input-sm">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input name="descripcion" type="text" id="descripcion" class="form-control" placeholder="Descripción de la Practica" required="true" value=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="precio">Monto ofrecido</label>
                            <input name="precio" type="number" id="precio" class="form-control" placeholder="Monto ofrecido" required="true" value=""/>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input name="imagen" type="file" id="imagen" placeholder="Imagen de la Practica" required="true" value=""/>
                        </div>
                    </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Confirmar"/>
                    </div>
                </div>
              </form>
          </div>
      </div>
  </div>

  <script>
  $('#id').change(function(){
    var rubroID = $(this).val();

    if(rubroID){
      $.ajax({
        type:"GET",
        url:"{{url('abmPractica')}}?id="+rubroID,
        success:function(res){
          if(res){
            $("#id_servicio").empty();
            $("#id_servicio").append('<option>Seleccionar Servicio</option>');
            $.each(res,function(key,value){
              $("#id_servicio").append('<option value="'+key+'">'+value+'</option>');
            });
          }else{
            $("#id_servicio").empty();
          }
        }
      });
    }
  });
  </script>

<footer>
@include("layouts.pie")