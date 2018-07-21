@include("layouts.cabecera")
<link href="{{asset('css/oferta.css')}}" rel="stylesheet">
</head>
<body>

	@if(session()->has('mail'))
		@include('layouts.navbar')
	@else 
		@include('layouts.navbarSinInicio')
	@endif

	<!-- https://ajgallego.gitbooks.io/laravel-5/content/capitulo_2_formularios.html -->
	<div class="container">
		<form method="" action=" edit/{{ $persona->id_persona }}">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>

		@include("layouts.pie")
