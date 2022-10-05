<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Producto']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del Producto', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['placeholder' => 'Selecciona una Categoría','class' => 'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la marca del Producto']) !!}
    @error('marca')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el modelo del Producto']) !!}
    @error('modelo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('stock', 'Cantidad en Existencia:') !!}
   {!! Form::number('stock', null, ['class' => 'form-control']) !!}
   @error('stock')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('price', 'Precio:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
    @error('price')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado:</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Sin Publicar
    </label>
    <label class="ml-2">
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    @error('status')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('file', 'Selecciona una Imagen') !!}
    {!! Form::file('file[]', ['class' => 'form-control-file', 'multiple', 'id' => 'file', 'accept'=>'image/jpeg,image/jpg,image/png']) !!}    
    @error('file')
        <small class="text-danger">{{$message}}</small>
    @enderror
    {{-- @foreach ($errors->all() as $mensaje)
        <small class="text-danger">{{$mensaje}}</small>
    @endforeach --}}
</div>
<div class="form-group">
    <p>Solo Imagenes: <strong>.jpeg .jpg .png</strong></p>
    <p>Selecciona <strong>máximo 3 imágenes</strong></p>
</div>
<div class="row mb-3">
    @if (isset($product))
        @php
            $images = $product->productimages;
            $cuantasImg = count($images);
        @endphp
        @if ($cuantasImg == 0)
            @for ($i = 0; $i < 3; $i++)
                <div class="col">
                    <div class="image-wrapper">
                        <img id="picture{{$i}}" src="https://cdn.pixabay.com/photo/2017/01/25/17/33/camera-2008479_960_720.png" alt="">
                    </div> 
                </div> 
            @endfor
        @else
            @for ($i = 0; $i < $cuantasImg; $i++)
                <div class="col">
                    <div class="image-wrapper">
                        <img id="picture{{$i}}" src="@if($images[$i]['url']) {{Storage::url($images[$i]['url'])}} @else https://cdn.pixabay.com/photo/2017/01/25/17/33/camera-2008479_960_720.png @endif" alt="">
                    </div> 
                </div>
            @endfor
            @for ($i = $cuantasImg; $i < 3; $i++)
            <div class="col">
                <div class="image-wrapper">
                    <img id="picture{{$i}}" src="https://cdn.pixabay.com/photo/2017/01/25/17/33/camera-2008479_960_720.png" alt="">

                </div> 
            </div>
            @endfor  
            
        @endif
    @else
        @for ($i = 0; $i < 3; $i++)
            <div class="col">
                <div class="image-wrapper">
                    <img id="picture{{$i}}" src="https://cdn.pixabay.com/photo/2017/01/25/17/33/camera-2008479_960_720.png" alt="">
                </div> 
            </div> 
        @endfor
    @endif
    
</div>