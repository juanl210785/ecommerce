@extends('adminlte::page')

@section('title', 'Ecommerce')

@section('content_header')
    <h1>Crear un Nuevo Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.products.store', 'enctype' => 'multipart/form-data']) !!}
                
                @include('admin.products.partials.form')

                <div class="form-group">                    
                    {!! Form::submit("Guardar", ["class" => "btn btn-primary"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/styles/image.css')}}">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"> </script>
    <script src="{{asset('vendor/scrits/slug.js')}}"></script>
    <script src="{{asset('vendor/scrits/imagen.js')}}"></script>
@stop