<x-app-layout>
    <div class="container py-8">
        @php
            $products = $order->products;
            $conteo = count($cantidad);
        @endphp
        @if (session('info'))
            <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Información</span>
                <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                    {{session('info')}}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Cerrar</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endif   
        

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mb-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-orange-600 dark:text-gray-100">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID Orden
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Fecha
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Artículos
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Total
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>                                              
                    <tr class="bg-white border-b dark:bg-orange-300 dark:border-orange-300">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$order->id}}            
                        </th>
                        <td class="py-4 px-6">
                            {{$order->date}}                                        
                        </td>
                        <td class="py-4 px-6">
                            {{$order->quantity}}                                         
                        </td>
                        <td class="py-4 px-6">
                            {{$order->subtotal}}
                        </td>                            
                        <td class="py-4 px-6">
                                        
                        </td>                       
                    </tr>                  
                </tbody>
            </table>
        </div>       
         {{-- dark:text-gray-400  dark:bg-gray-700 dark:text-gray-400 dark:text-white dark:bg-gray-800 dark:text-white dark:text-blue-500--}}
        <div class="overflow-x-auto relative mb-6">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 ">
                    <tr>
                        <th scope="col" class="py-3 px-6 rounded-l-lg">
                            Nombre Producto
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Marca
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Modelo
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Precio
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Cantidad
                        </th>
                        <th scope="col" class="py-3 px-6">
                            SubTotal
                        </th>
                        <th scope="col" class="py-3 px-6 rounded-r-lg">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $suma = 0;
                        $c = 0;                
                    @endphp
                    @for($i = 0; $i < count($products); $i++)
                        @for ($i = 0; $i < $conteo; $i++)
                            <tr class="bg-gray-200 ">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                    {{$products[$i]['name']}}                            
                                </th>
                                <td class="py-4 px-6">
                                    {{$products[$i]['marca']}}                            
                                </td>
                                <td class="py-4 px-6">
                                    {{$products[$i]['modelo']}}                            
                                </td>
                                <td class="py-4 px-6">
                                    {{'$ '.$products[$i]['price']}}                            
                                </td>
                                <td class="py-4 px-6">
                                    {{$cant = $cantidad[$i]['cantidad']}}                                                        
                                </td>
                                <td class="py-4 px-6">
                                    {{'$ '.$subtotal = $cantidad[$i]['cantidad'] * $products[$i]['price']}}                          
                                </td>
                                <td class="py-4 px-6">
                                    {!! Form::open(['route'=> ['products.remove', $products[$i]['id'], $order->id], 'method' => 'delete']) !!}
                                        <button type="submit" class="font-medium text-orange-600  hover:underline">Eliminar</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @php 
                                $suma = $subtotal + $suma;
                                $c = $cant + $c;
                            @endphp
                        @endfor
                    @endfor            
                </tbody>
                <tfoot>
                    <tr class="font-semibold text-gray-900 ">
                        <th scope="row" class="py-3 px-6 text-base">Total</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="py-3 px-6">{{$c}}</td>
                        <td class="py-3 px-6">{{'$ '.$suma}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div>
            <a href="" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Pagar Orden
            </a>
            <a href="/" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Seguir Comprando
            </a>
        </div>

    </div>
</x-app-layout>