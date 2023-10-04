@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('adminlte::page')

@section('title', 'Evaluaciones')

@section('content_header')
    <h1>Evaluaciones</h1>
@stop

@section('content')

  <div class="p-3">
  
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
