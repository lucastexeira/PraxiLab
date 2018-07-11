
    <link href="{{asset('css/estilosWizard.css')}}" rel="stylesheet">
    
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <form role="form">
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
                                <!--select name="id_servicio" id="id_servicio" class="form-control input-sm">
                                    @foreach ($servicios as $servicio)
                                        <a href="" alt="{{ $servicio->id }}" src="{{ $servicio->nombre }}">
                                        $servicio->nombre_servicio</a>
                                    @endforeach
                                </select-->

                            <div class="col-md-10" id="col-servicio">
                                <div class="servicios">
                                    <ol>
                                    @foreach ($servicios as $servicio)
                                            <a href="#step2">
                                                <h4 class="center-block servicioSeleccionado" id="{{ $servicio->id }}" >
                                                    {{ $servicio->nombre_servicio }}
                                                </h4>
                                            </a>
                                    @endforeach
                                    <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step"> Guardar y continuar?</button></li>
                            </ul>
                                    </ol>
                                 </div>
                            </div>
                            
                        </div>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Guardar y continuar?</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Describe la Práctica</h3>
                        
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Nombre</label>
                                    <input name="descripcion" type="text" id="descripcion" class="form-control" placeholder="Descripción de la Practica" required="true" value=""/>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" cols="40" rows="4" class="form-control"></textarea>
                                </div>

                            </div>

                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input name="imagen" type="file" id="imagen" placeholder="Imagen de la Practica" required="true" value="" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label for="precio">Monto ofrecido</label>
                                    <input name="precio" type="number" id="precio" class="form-control" placeholder="Monto ofrecido" required="true" value=""/>
                                </div>
                            </div>
                        </div>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
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


        //Oculto el rubro a seleccionar y los servicios
        $("#imgRubro").hide();
        $(".nombreRubroSeleccionado").hide();
        $(".servicios").hide();
        $(".h3Servicios").hide();

        //$('#class-rubro').attr('class', 'col-md-2').hide();

        $(".servicioSeleccionado").click(function(){
            var servicioID = $(this).attr("id");

            var i;
            for (i = 1; i < 9; i++) { 
                $('#' + i).removeClass('servicioClickeado');
            }
            $('#' + servicioID).addClass('servicioClickeado');
        });

        $("img").click(function(){
        
            var rubroID = $(this).attr("alt");
            var rubroIMG = $(this).attr("src");

            $('#rubroSeleccionado').addClass('col-md-2');
 
            // eliminar una clase del elemento
            

            if(rubroID){
              $.ajax({
                type:"GET",
                url:"{{url('wizard')}}?id="+rubroID,
                success:function(res){
                  if(res){
                    /*$("#id_servicio").empty();
                    $("#id_servicio").append('<option>Seleccionar Servicio</option>');*/
                    
                    //Oculto listado de rubros con efecto lento
                    $(".imagenRubroSinSeleccion").toggle("slow");
                     
                     //Cuando se selecciona un rubro, agrego el id e imagen al rubro y lo muestro
                     $('#imgRubro').attr('alt', rubroID).show("slow");
                     $('#imgRubro').attr('src', rubroIMG).show("slow");

                     //Muestro listado de servicios por ID de Rubro
                     $(".servicios").show("slow");
                     $(".h3Rubros").hide();
                     $(".h3Servicios").show();
                     //$('#class-rubro').attr('class', 'col-md-2').show();
                     //$('#class-servicio').attr('class', 'col-md-10').show();

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
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

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


