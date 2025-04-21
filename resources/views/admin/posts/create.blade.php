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

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="form-group">
                    <label>Nombre:</label>
                    <input id="name" type="text" name="name" class="form-control"
                        placeholder="Ingrese el Nombre de la noticia">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Slug de la noticia --}}
                <div class="form-group">
                    <label>Slug:</label>
                    <input id="slug" type="text" name="slug" class="form-control"
                        placeholder="Ingrese el Slug de la noticia" readonly>

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Categoría de la noticia --}}
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    

                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Etiquetas de la noticia --}}
                <div class="form-group">
                    <p>Etiquetas</p>
                    
                    @foreach ($tags as $tag)
                        <label for="">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>                    
                    @endforeach


                    {{-- <select name="tag" id="tag_id" class="form-control">
                        @foreach ($tags as $tag)
                            <option value={{ $tag }}>{{ $tag }}</option>
                        @endforeach
                    </select> --}}

                    @error('tag')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Estado de la noticia --}}
                <div class="form-check">
                    <p class="font-weight-bold">Estado</p>
                    
                    <input class="form-check-input" type="radio" name="status" value="1" checked>
                    <label class="form-check-label" for="1">
                        Borrador
                    </label>

                    <br>
                    
                    <input class="form-check-input" type="radio" name="status" value="2">
                    <label class="form-check-label" for="2">
                        Publicado
                    </label>

                    <hr>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Extracto de la noticia --}}
                <div class="form-group">
                    <label for="extract">Extracto:</label>
                    <textarea class="form-control" name="extract" id="extract" cols="30" rows="6"></textarea>

                    @error('extract')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">Cuerpo de la noticia:</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>

                    @error('body')
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

    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
