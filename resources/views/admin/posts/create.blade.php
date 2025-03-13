@extends('adminlte::page')

@section('title', 'SICYT')

@section('content_header')
	<h1>Nueva Noticia</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">

			{{-- Formulario para crear Noticias --}}
			<form action="{{ route('admin.posts.store') }}" method="POST" autocomplete="off">
				@csrf

				<div class="form-group">
					<label>Nombre:</label>
					<input id="name" type="text" name="name" class="form-control" placeholder="Ingrese el Nombre de la noticia">

					@error('name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					<label>Slug:</label>
					<input id="slug" type="text" name="slug" class="form-control" placeholder="Ingrese el Slug de la noticia" readonly>

					@error('slug')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="category_id">Categoría:</label>
					<select name="category" id="category_id" class="form-control">
						@foreach ($categories as $category)
							<option value={{ $category }}>{{ $category }}</option>
						@endforeach
					</select>
				
					@error('category')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">Crear noticia</button>
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
