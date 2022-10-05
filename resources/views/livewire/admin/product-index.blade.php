<div class="card">
    {{-- {{$search}} --}}
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de un producto">
    </div>
    @if ($products->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Existencia</th>
                        <th>Categoría</th>
                        <th>Publicado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->modelo}}</td>
                            <td>{{$product->marca}}</td>
                            <td>{{'$'.$product->price}}</td>
                            <td>{{$product->stock.'U'}}</td>
                            <td>{{$product->category->name}}</td>
                            <td><?php echo $product->status == 2 ? 'Si' : 'No' ?></td>
                            <td with='10px'>
                                <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td with='10px'>
                                <form action="{{route('admin.products.destroy', $product)}}" method="post">
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
        <div class="card-footer">
            {{$products->links()}}
        </div>
        @else
        <div class="card-body">
            <strong>No hay registros para mostrar...</strong>
        </div>
    @endif
</div>
