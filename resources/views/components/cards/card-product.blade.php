@props(['product', 'active' => false, 'edit' => false])

<div class="card rounded-md bg-base-100 w-94 shadow-xl ">
    <figure class=" max-h-[200px]">
        <img src="{{ Vite::asset('storage/app/' . $product->imageUrl) }}" alt="{{ $product->category }}" />

    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $product->productname }}</h2>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}$</p>
        <p class=" text-xs">Available Stocks:{{ $product->stocks }}</p>

        <div class=" flex flex-wrap space-x-1">
            @foreach ($product->producttags as $tag)
                <div class="p-1 bg-gray-200 text-xs">
                    <a href="{{ route('sortTag', $tag->name) }}">{{ $tag->name }}</a>
                </div>
            @endforeach
        </div>
        <div class="card-actions justify-end">
            @if (!$active)
                <div class=" w-full flex flex-row justify-between">
                    <form action="{{ Auth::user() ? route('cart', $product->id) : route('login') }}"
                        method="{{ Auth::user() ? 'POST' : 'GET' }}">
                        @csrf
                        <input type="submit" class="btn " value="Add To Cart" />

                    </form>
                    <button class="btn ">Buy Now</button>
                </div>
            @endif

            {{-- only in seller --}}
            @if ($edit)
                <div class=" flex flex-row justify-between w-full">
                    {{-- <form action="{{ route('deleteproduct', $productid) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('deleteproduct', $productid) }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            Delete
                        </a>
                    </form> --}}


                    <form action="{{ route('deleteproduct', $productid) }}" method="POST" id="delete">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-red-400" type="submit">Delete</button>
                    </form>

                    <a class="btn " href="{{ route('manageproducts', $productid) }}">Edit</a>


                </div>
            @endif
        </div>
    </div>
</div>
