@extends('adminlte::page')

@section('title', 'SICYT')

@section('content_header')
    <h1>Listado de Noticias</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop