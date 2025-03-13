@extends('adminlte::page')

@section('title', 'SICYT')

@section('content_header')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success float-right">Nueva noticia</a>

    <h1>Listado de Noticias</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop