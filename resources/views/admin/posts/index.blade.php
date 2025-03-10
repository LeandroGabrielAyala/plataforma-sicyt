@extends('adminlte::page')

@section('title', 'SICYT')

@section('content_header')
    <h1>Listado de Noticias</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop