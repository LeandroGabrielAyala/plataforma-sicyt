@extends('adminlte::page')

@section('title', 'SICYT')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')

    {{-- Mensaje de notifcación cuando se edita una categoría --}}
    @if (session('info'))
        <div class="alert alert-info" role="alert">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
          
          {{-- Formulario para crear Categoría --}}
          <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label>Nombre:</label>
              <input id="name" type="text" name="name" class="form-control" placeholder="Ingrese el Nombre de la categoría" value="{{ $category->name }}">

              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Slug:</label>
              <input id="slug" type="text" name="slug" class="form-control" placeholder="Ingrese el Slug de la categoría" readonly value="{{ $category->slug }}">

              @error('slug')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar categoría</button>

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