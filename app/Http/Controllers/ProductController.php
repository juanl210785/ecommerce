<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarritoProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status', 2)->latest('id')->paginate(8);
                    
        return view('products.index', compact('products'));
    }

    public function show(Product $product){
        $this->authorize('published', $product);
        if (auth()->user()) {
            $order = Order::where('pendiente', 1)->where('user_id', auth()->user()->id)->latest('created_at')->first();
            
            return view('products.show', compact('product', 'order'));
        }else{
            return view('products.show', compact('product'));            
        }
       
    }

    public function carrito(CarritoProductRequest $request, Product $product){
       
        $order = Order::create([
            'date' => date('Y-m-d'),
            'quantity' => $request->cantidad,
            'subtotal' => $request->cantidad * $product->price,
            'pendiente' => 1,
            'user_id' => $request->user_id
        ]);
    
        $order->products()->attach($product->id);

        $comprobacion = OrderProduct::where('order_id', $order->id)->where('product_id', $product->id)->get();
        foreach ($comprobacion as $c) {
            $c->update([
                'cantidad' => $c->cantidad + $request->cantidad
            ]);
        }
        
        return redirect()->route('products.show', $product)->with('info', 'Se agrego al Carrito Correctamente');       
    }

    public function addcarrito(CarritoProductRequest $request, Product $product, Order $order){

        //return 'Entraste';
        
        $cant_total = $order->quantity + $request->cantidad;
        $total =  ($request->cantidad * $product->price) + $order->subtotal;
            $order->update([
            'quantity' => $cant_total,
            'subtotal' => $total,
        ]);

        $comprobacion = OrderProduct::where('order_id', $order->id)->where('product_id', $product->id)->get();
        //echo json_encode($comprobacion);
        if (count($comprobacion) > 0) {
            foreach ($comprobacion as $c) {
            $c->update([
                'cantidad' => $c->cantidad + $request->cantidad
            ]);
            }
            return redirect()->route('products.show', $product)->with('info', 'Se agrego al Carrito Correctamente');
        }

        $order->products()->attach($product->id);
        $comprobacion = OrderProduct::where('order_id', $order->id)->where('product_id', $product->id)->get();
        foreach ($comprobacion as $c) {
            $c->update([
                'cantidad' => $c->cantidad + $request->cantidad
            ]);
        }
        return redirect()->route('products.show', $product)->with('info', 'Se agrego al Carrito Correctamente');
            
    }

    public function orden(Order $order){
        $cantidad = OrderProduct::where('order_id', $order->id)->get();
        //echo json_encode($cantidad);
        return view('products.orden', compact('order', 'cantidad'));
    }

    public function destroy(Product $product, Order $order){
        
        $products = $order->products;
        if (count($products) !== 1) {
            $comprobacion = OrderProduct::where('order_id', $order->id)->where('product_id', $product->id)->get();
            foreach ($comprobacion as $c) {
                $order->update([
                    'quantity' => $order->quantity - $c->cantidad,
                    'subtotal' => $order->subtotal - ($product->price * $c->cantidad)
                ]);
            }
            $order->products()->detach($product->id);
            return redirect()->route('products.orden', $order)->with('info', 'Se removio el producto del Carrito Correctamente');
        }else{
            $comprobacion = OrderProduct::where('order_id', $order->id)->where('product_id', $product->id)->get();
            foreach ($comprobacion as $c) {
                $order->update([
                    'quantity' => $order->quantity - $c->cantidad,
                    'subtotal' => $order->subtotal - ($product->price * $c->cantidad)
                ]);
            }
            $order->products()->detach($product->id);
            $order->delete();
            return redirect()->route('products.index')->with('info', 'Se removio la orden');
            
        }     
        
    }

    public function category (Category $category){
        
        $products = Product::where('category_id', $category->id)
                                    ->where('status', 2)
                                    ->latest('id')
                                    ->paginate(5);
        return view('products.category', compact('products', 'category'));
    }
}
