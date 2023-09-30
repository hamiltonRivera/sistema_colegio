@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('adminlte::page')

@section('title', 'Materias - Docentes')

@section('content_header')
    <h1>Materias - Docentes</h1>
@stop

@section('content')
  <div class="p-5">
   @livewire('administrator.courses-teacher.courses-teacher')
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    @livewireScripts
    @livewireStyles
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
@stop
