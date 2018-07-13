@include("layouts.cabecera")
<script class="jsbin" src="{{asset('/js/upImg.js')}}}"></script>
<link href="{{asset('css/upImg.css')}}" rel="stylesheet">
</head>
<body>

@include("layouts.navbar")

<form method="POST" action="cargarEvidencia">

	<div class="container panel panel-default ">

		<div class="card-body ">

			<div class="row mt centered ">
		      <div class="col-lg-8 col-lg-offset-2">
		        <h1>Carga de evidencia en la practica: Nombre de la practica</h1>
		        <hr>
		      </div>
		    </div>

			<div class="file-upload">
			  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

			  <div class="image-upload-wrap">
			    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
			    <div class="drag-text">
			      <h3  style="color: black">Drag and drop a file or select add Image</h3>
			    </div>
			  </div>
			  <div class="file-upload-content">
			    <img class="file-upload-image" src="#" alt="your image" />
			    <div class="image-title-wrap">
			      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
			    </div>
			  </div>
			</div>
		</div>

		<div class="form-group">
            <label for="Comentario"><h3>Comentario</h3></label>
            <input name="Comentario" type="text" id="Comentario" class="form-control" placeholder="Escriba un comentario" required="required"/>
        </div>

        <br>
        <label for="Comentario"><h3>Calificación</h3></label>
        <br>
	        <div class="stars">

	        	@for($i=1;$i<6;$i++)

					<input class="star star-4" id="star-{{$i}}" type="radio" name="star"/>
					<label class="star star-4" for="star-{{$i}}"></label>

				@endfor

			</div>

		<div class="row mt centered">
			<div class="col-lg-4 col-lg-offset-4">
				<input type="submit" class="file-upload-btn btn-block" value="Agegar Evidencia"/>
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