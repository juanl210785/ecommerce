<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');
        $this->middleware('can:admin.products.destroy')->only('destroy');
    }

    public function index()
    {
        $products = Product::where('status', 2)->get(); 
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {   
        $categories = Category::pluck('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    private $nombreCarpetaFotos = "products";

    public function store(ProductRequest $request)
    {   
        $product = Product::create($request->all());
        
        foreach ($request->file("file") as $foto) {
            //$fotoDeArticulo = new FotoDeArticulo;
            $rutaLarga = $foto->store($this->nombreCarpetaFotos);
            $productimage = ProductImage::create([
                'url' => $rutaLarga,
                'product_id' => $product->id
            ]);
        }
        return redirect()->route('admin.products.edit', $product)->with('info', 'Se agrego el producto correctamente');
    }

    public function edit(Product $product)
    {
        $this->authorize('owner', $product);
        
        $categories = Category::pluck('name', 'id');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('owner', $product);

        $product->update($request->all());
        $images = $product->productimages;
        if (count($images) > 0) {            
            if ($request->file("file")) {
                foreach ($images as $imagen) {
                    Storage::delete($imagen->url);
                    $imagen->delete();
               }
                foreach ($request->file("file") as $foto) {
                    $rutaLarga = $foto->store($this->nombreCarpetaFotos);
                    $productimage = ProductImage::create([
                        'url' => $rutaLarga,
                        'product_id' => $product->id
                    ]);
                }
            }     
            
        }else{
            if ($request->file("file")) {
                foreach ($request->file("file") as $foto) {
                    $rutaLarga = $foto->store($this->nombreCarpetaFotos);
                    $productimage = ProductImage::create([
                        'url' => $rutaLarga,
                        'product_id' => $product->id
                    ]);                
                } 
            }
        }
        return redirect()->route('admin.products.edit', $product)->with('info', 'Se actualizó el producto correctamente');   
    }

    public function destroy(Product $product)
    {
        $this->authorize('owner', $product);
        
        $product->delete();
        return redirect()->route('admin.products.index')->with('info', 'El Producto se eliminó con éxito');
    }
}
