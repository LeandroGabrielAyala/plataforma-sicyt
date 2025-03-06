@extends('adminlte::page')

@section('title', 'SICYT')

@section('content_header')
	<h1>Crear una Etiqueta</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			{{-- Formulario para crear Etiqueta --}}
			<form action="{{ route('admin.tags.store') }}" method="POST">
				@csrf

				<div class="form-group">
					<label>Nombre:</label>
					<input id="name" type="text" name="name" class="form-control" placeholder="Ingrese el Nombre de la etiqueta">
				
					@error('name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label>Slug:</label>
					<input id="slug" type="text" name="slug" class="form-control" placeholder="Ingrese el Slug de la etiqueta" readonly>
				
					@error('slug')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="">Color:</label>
					<select name="color" id="" class="form-control">
						@foreach ($colors as $color)
							<option value={{ $color }}>{{ $color }}</option>
						@endforeach
					</select>
				
					@error('color')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary">Actualizar etiqueta</button>
				
			</form>
		</div>
	</div>
@stop

@section('js')
	<script src="{{ asset('../node_modules/speakingurl/speakingurl.min.js') }}"></script>
	<script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-2.1.0/dist/jquery.stringtoslug.min.js') }}"></script>

	<script>
		$(document).ready(function() {
			$("#name").stringToSlug({
				setEvents: 'keyup keydown blur',
				getPut: '#slug',
				space: '-'
			});
		});
	</script>
@endsection
