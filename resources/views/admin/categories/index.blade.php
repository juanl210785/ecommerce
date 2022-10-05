@extends('adminlte::page')

@section('title', 'Ecommerce')

@section('content_header')
    <h1>Lista de Categorías</h1>
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
        <div class="card-header">
            <a href="{{route('admin.categories.create')}}" class="btn btn-secondary float-right">Agregar Categoría</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width='10px'>
                                <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width='10px'>
                                {!! Form::open(['route'=> ['admin.categories.destroy', $category], 'method' => 'delete']) !!}

                                    {!! Form::submit('Eliminar', ['class'=>'btn btn-danger btn-sm', 'on-click'=>"denegar({{route('admin.categories.destroy', $category->id)}})"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}


@section('js')
<script>
	function denegar(url){
		$.confirm({
			title: '¿Seguro Desesas Anular?',
			content: '¡Se Anulara la Solicitud!',
			buttons:{
				confirm: {
					text: 'Confirmar',
					btnClass: 'btn-danger',
					action:function(){
						window.location.href=url;
					},
				},				
				cancel: {
            		text: 'Cancelar',
            		btnClass: 'btn-success',
            		action:function(){
            			//la accion del boton cancelar
            			$.alert('Canceledo');
            		},
            	},	
			},			
		});
	}
</script>
@endsection