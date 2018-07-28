@include("layouts.cabecera")
<script class="jsbin" src="{{asset('/js/upImg.js')}}}"></script>
<link href="{{asset('css/upImg.css')}}" rel="stylesheet">
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<form method="" role="form" action="{{url('createEvidenciaVoluntario/'.$practicaEvidencia->id_historial_practica.'')}}"> 
	<input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="container panel panel-default ">

		<div class="card-body ">

			<div class="row mt centered ">
		      <div class="col-lg-8 col-lg-offset-2">
		        <h1>Carga de evidencia en la practica: <i>{{ $practicaEvidencia->nombre_practica }}</i></h1><img src="{{asset($practicaEvidencia->imagen_practica )}}" class="img-rounded" width="100" height="80" alt="Imagen Practica"> 
		        <hr>
		      </div>
		    </div>
		</div>

		<div class="form-group">
            <label for="Comentario"><h3>Comentario</h3></label>
            <input type="text" id="comentario" name="comentario" class="form-control" placeholder="Escriba un comentario" required="required" value="{{ $evidencia->comentario }}"/>
        </div>

        <br>
        <label for="Comentario"><h3>Calificación</h3></label>
        <br>
	        <div class="stars">

	        	@for($i = 5; $i > 0; $i--)

					<input class="star star-4" id="star-{{$i}}" type="radio" name="calificacion" value="{{ $i }}"/>
					<label class="star star-4" for="star-{{$i}}"></label>

				@endfor

			</div>

		<div class="row mt centered">
			<div class="col-lg-4 col-lg-offset-4">
				<a  href="verEvidencia/" >
				<input type="submit" class="file-upload-btn btn-block" value="Agregar Evidencia"/>
				</a>
			</div>
		</div><!-- /row -->
	</div>

</form>


<script>
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});



</script>
@include("layouts.pie")