@extends('adminlte::page')

@section('title', 'SICYT')

@section('content_header')
    <h1>Lista de Etiquetas</h1>
@stop

@section('content')

    {{-- Mensaje de notificación para Creación y Eliminación de etiquetas --}}
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @elseif (session('infoDelete'))
        <div class="alert alert-danger" role="alert">
            {{ session('infoDelete') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{ route('admin.tags.create') }}">Nueva etiqueta</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->color }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
