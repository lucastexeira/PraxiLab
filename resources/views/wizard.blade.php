@include("layouts.cabecera");
    <link href="{{asset('css/estilosWizard.css')}}" rel="stylesheet">
    
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

@include("layouts.navbar");
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
            <form role="form" id="formularioWizard" class="formularioWizard" method="post">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">

                        <h3 class="h3Rubros">Elegir el Rubro que corresponde con su práctica.</h3>
                        <h3 class="h3Servicios">Elegir el Servicio que corresponde con su práctica.</h3>

                        <div class="col-md-12" id="contenedor">
                            <div id="listadoRubros">
                                <div class="imagenRubroSinSeleccion">  
                                  @foreach ($rubros as $rubro)
                                    <button class="botonRubro" type="button" id="botonRubro">
                                        <img width="150" height="100" alt="{{ $rubro->id }}" src="{{ $rubro->imagen }}"/>
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
                                            <a href="#step2">
                                                <h4 class="center-block servicioSeleccionado" id="{{ $servicio->id }}" >
                                                    {{ $servicio->nombre_servicio }}
                                                </h4>
                                            </a>
                                    @endforeach
                                    
                                    </ol>
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
                                    <input name="descripcion" type="text" id="descripcion" class="form-control" placeholder="Descripción de la Practica" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" cols="40" rows="4" class="form-control" required></textarea>
                                </div>

                            </div>

                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input name="imagen" type="file" id="imagen" placeholder="Imagen de la Practica" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="precio">Monto ofrecido</label>
                                    <input name="precio" type="number" id="precio" class="form-control" placeholder="Monto ofrecido" required>
                                </div>
                            </div>
                        </div>

                        <ul class="list-inline pull-right">
                            <button type="submit" class="btn btn-theme btn-lg next-step" id="botonStep2">Guardar y Finalizar</button>
                        </ul>
                    </div>

                    <div class="tab-pane text-center" role="tabpanel" id="complete">
                        <h2>¡Se ha creado la práctica exitosamente!</h2>

                        <ul class="list-group">
                          <li class="list-group-item"><b>Rubro</b> Fiestas y animación</li>
                          <li class="list-group-item"><b>Servicio</b> Dapibus ac facilisis in</li>
                          <li class="list-group-item"><b>Práctica</b> Morbi leo risus</li>
                          <li class="list-group-item"><b>Descripción</b> Porta ac consectetur ac</li>
                          <li class="list-group-item"><b>Vestibulum</b> at eros</li>
                        </ul>

                        </br>
                        <button type="button" class="btn btn-theme btn-lg next-step">
                            <a href="{{ 'oferta' }}">Ir a mi práctica</a>
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
            $("#botonStep1").show();
            $('#botonStep1').addClass('col-md-2');
        });

        $("img").click(function(){
        
            var rubroID = $(this).attr("alt");
            var rubroIMG = $(this).attr("src");

            $('#rubroSeleccionado').addClass('col-md-3');
            // eliminar una clase del elemento
            

            if(rubroID){
              $.ajax({
                type:"GET",
                url:"{{url('wizard')}}?id="+rubroID,
                success:function(res){
                  if(res){
                    //Oculto listado de rubros con efecto lento
                    $(".imagenRubroSinSeleccion").toggle("slow");
                     
                     //Cuando se selecciona un rubro, agrego el id e imagen al rubro y lo muestro
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


