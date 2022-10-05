@extends('adminlte::page')

@section('title', 'Ecommerce')

@section('content_header')
    <h1>Editar un Producto</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Bien!</strong> {{session('info')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($product, ['route' => ['admin.products.update', $product], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}
                                
                @include('admin.products.partials.form')

                <div class="form-group">                    
                    {!! Form::submit("Actualizar", ["class" => "btn btn-primary"]) !!}
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