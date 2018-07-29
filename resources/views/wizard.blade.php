@include("layouts.cabecera");
    <link href="{{asset('css/estilosWizard.css')}}" rel="stylesheet">
    
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif
  
<div class="container">
    <div class="row">
        <div class="well">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" id="iconoPaso1" class="active">
                        <a href="" id="irAPaso1" data-toggle="tab" aria-controls="step1" role="tab" title="Paso 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" id="iconoPaso2" class="disabled">
                        <a href="" id="irAPaso2" data-toggle="tab" aria-controls="step2" role="tab" title="Paso 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" id="iconoPaso3" class="disabled">
                        <a href="" id="irAPaso3" data-toggle="tab" aria-controls="complete" role="tab" title="Finalizado">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <form action=" createPractica/{{ $practica->id }}" role="form" id="formularioWizard" class="formularioWizard" method="">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">

                        <h3 class="h3Rubros">Elegir el Rubro que corresponde con su práctica.</h3>
                        <h3 class="h3Servicios">Elegir el Servicio que corresponde con su práctica.</h3>

                        <div class="col-md-12" id="contenedor">
                            <div id="listadoRubros">
                                <div class="imagenRubroSinSeleccion">  
                                  @foreach ($rubros as $rubro)
                                    <button class="botonRubro" type="button" id="botonRubro">
                                        <img width="225" height="100" alt="{{ $rubro->id }}" src="{{ $rubro->imagen }}"/>
                                        <p>{{ $rubro->nombre_rubro }}</p>
                                    </button>
                                   @endforeach
                                </div>

                                <div class="imagenRubroSeleccionado" id="rubroSeleccionado">  
                                    <button class="botonRubro" type="button">
                                        <img width="150" height="100" id="imgRubro" src=""/>
                                        <p class="nombreRubroSeleccionado"></p>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4" id="col-servicio">
                                <div class="servicios">
                                    <ol>
                                    @foreach ($servicios as $servicio)
                                        <a id="listaServicios" href="#step2">
                                            <h4 class="center-block servicioSeleccionado" id="{{ $servicio->id }}" >
                                                {{ $servicio->nombre_servicio }}
                                            </h4>
                                        </a>
                                    @endforeach
                                    
                                    </ol>

                                    <input name="id_servicio" id="id_servicio" type="hidden" value=""/>

                                    <!--input name="id_practicante" id="id_practicante" type="hidden" value="2"/-->

                                    <input name="id_voluntario" id="id_voluntario" type="hidden" value=""/>
                                 </div>
                            </div>
                            <div>
                                <button type="button" id="botonStep1" class="btn btn-theme
                                btn-lg next-step"> Guardar y continuar</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Describe la Práctica</h3>
                        
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Nombre</label>
                                    <input name="nombre_practica" type="text" id="nombre_practica" class="form-control" placeholder="Nombre de la Practica" required="required">

                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" type="text" id="descripcion" cols="40" rows="4" class="form-control" placeholder="Descripcion de la Practica" required="required"></textarea>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <input name="imagen_practica" type="hidden" id="imagen_practica" required="required" value="img/logos/logo_default.png"/>

                                <div class="form-group">
                                    <label for="precio">Monto ofrecido</label>
                                    <input name="precio" id="precio" type="number" class="form-control" placeholder="Monto ofrecido" required>
                                </div>
                            </div>
                        </div>

                        <ul class="list-inline pull-right">
                            
                            <button type="button" class="btn btn-theme btn-lg next-step" id="botonStep2">Guardar y Finalizar
                            </button>
                            <!--button type="submit" class="btn btn-theme btn-lg">Guardar y Finalizar
                            </button-->                            
                        </ul>
                    </div>
            
                    <div class="tab-pane text-center" role="tabpanel" id="complete">
                        <h2>¡Confirmar y guardar!</h2>

                    <div class="col-lg-12">
                        <ul class="list-group">
                          <li class="list-group-item" style="color:black">
                            
                                <div class="col-lg-6 col-lg-offset-3">
                                    <b>Nombre de la Practica:</b>
                                    <input name="nombre_de_practica" type="text" id="nombre_de_practica" class="form-control" placeholder="Nombre de la Practica" value="" disabled>
                                </div>  
                          
                          </li>
                          <li class="list-group-item" style="color:black">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <b>Descripcion de la Practica:</b>
                                    <input name="descripcion_de_practica" type="text" id="descripcion_de_practica" class="form-control" value="" disabled>
                                </div>
                          </li>
                          <li class="list-group-item" style="color:black">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <b>Precio de la Practica:</b>
                                    $<input name="precio_de_practica" type="text" id="precio_de_practica" class="form-control" value="" disabled>
                                </div>
                          </li>
                        </ul>
                    </div>
                        </br>
                        <!--button type="button" class="btn btn-theme btn-lg next-step">
                            <a href="{{ 'oferta' }}">Ir a mi práctica</a>
                        </button-->
                        <button type="submit" class="btn btn-theme btn-lg">Guardar y Finalizar
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
   </div>
</div>

<script>
    $(document).ready(function(){


    //PASO 1    
        //Oculto el rubro a seleccionar y los servicios
        $("#imgRubro").hide();
        $(".nombreRubroSeleccionado").hide();
        $(".servicios").hide();
        $(".h3Servicios").hide();
        $("#botonStep1").hide();

        //$('#class-rubro').attr('class', 'col-md-2').hide();

        $(".servicioSeleccionado").click(function(){
            var servicioID = $(this).attr("id");

            var i;
            for (i = 1; i < 9; i++) { 
                $('#' + i).removeClass('servicioClickeado');
            }
            $('#' + servicioID).addClass('servicioClickeado');
            $('#id_servicio').attr('value', servicioID);
            $("#botonStep1").show();
            $('#botonStep1').addClass('col-md-2');
        });

        $("img").click(function(){
        
            var rubroID = $(this).attr("alt");
            var rubroIMG = $(this).attr("src");

            /*
            if (rubroID == 1){
                $('#servicioSeleccionado').attr('value', 1)                
            }
    */
            $('wizard').attr('href', 'id='+rubroID);

            $('#rubroSeleccionado').addClass('col-md-3');
            // eliminar una clase del elemento
            

            if(rubroID){
              $.ajax({
                type:"GET",
                data:rubroID,
                success:function(res){
                  if(res){
                    //Oculto listado de rubros con efecto lento
                    $(".imagenRubroSinSeleccion").toggle("slow");
                     
                     //Cuando se selecciona un rubro, agrego el id e imagen (para guardarlo) al rubro y lo muestro

                     $('#imgRubro').attr('alt', rubroID).show("slow");
                     $('#imgRubro').attr('src', rubroIMG).show("slow");

                     //Muestro listado de servicios por ID de Rubro
                     $(".servicios").show("slow");
                     $(".h3Rubros").hide();
                     $(".h3Servicios").show();

                    $.each(res,function(key,value){
                      $("#id_servicio").append('<option value="'+key+'">'+value+'</option>');
                      $("#imgRubro").append('<p>"'+value+'"</p>');
                    });
                  }else{
                    $("#id_servicio").empty();
                  }
                }
            });
        }
    });


    //PASO 2
        //Si apreto el boton de confirmar y continuar del PASO 1, deshabilito al icono1
        $("#botonStep1").click(function(){
            
            $('#iconoPaso1').addClass('disabled');
            $('#irAPaso2').attr('href', '#step2');
        });

        //Si apreto el boton de confirmar y finalizar del PASO 2, deshabilito al icono2
        $("#botonStep2").click(function(){
            
            $('#irAPaso2').removeAttr('href', '#step2');
            $('#iconoPaso2').addClass('disabled');
            $('#irAPaso3').attr('href', '#complete');


            var nombre_practica = $('#nombre_practica').val();
            //$('#nombre_practica').val(nombre_de_practica);
            $('#nombre_de_practica').attr('value', nombre_practica);

            var descripcion = $('#descripcion').val();
            $('#descripcion_de_practica').val(descripcion);

            var precio = $('#precio').val();
            $('#precio_de_practica').val(precio);

        }); 


        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();
        
        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);
        
            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
});

function nextTab(elem) {
$(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
  

</script>
<footer>
@include("layouts.pie")


