<x-app-layout>   
    <div class="container py-8">
        @auth
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
        @endauth
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @foreach ($products as $product)
                @php                   
                    if (empty($product->productimages->first()->url)) {
                        //echo 'esta vacia <br>' ;
                        $url = 'https://cdn.pixabay.com/photo/2017/01/25/17/33/camera-2008479_960_720.png';
                    }else{
                         //echo 'no esta vacia';     
                        $url = Storage::url($product->productimages->first()->url);
                    }
                                      
                @endphp
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif " style="background-image: url({{$url}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            <span class="inline-block px-3 h-6 bg-green-500 text-white rounded-full">
                                {{$product->price.' $'}}
                            </span>                            
                        </div>
                        <h1 class="text-4xl leading-8 font-bold text-white">
                            <a href="{{route('products.show', $product)}}">
                                {{$product->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>