@props([
    'productid' => 0,
    'productname' => '',
    'description' => '',
    'imageUrl' => '',
    'category' => '',
    'price' => '',
    'stocks' => 0,
    'active' => false,
    'edit' => false,
])

<div class="card rounded-md bg-base-100 w-94 shadow-xl ">
    <figure class=" max-h-[200px]">
        <img src="{{ $imageUrl }}" alt="{{ $category }}" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $productname }}</h2>
        <p>{{ $description }}</p>
        <p>{{ $price }}$</p>
        <p class=" text-xs">Available Stocks:{{ $stocks }}</p>
        <div class="card-actions justify-end">
            @if (!$active)
                <button class="btn ">Buy Now</button>
            @endif

            {{-- only in seller --}}
            @if ($edit)
                <div class=" flex flex-row justify-between w-full">
                    <button class=" btn  bg-red-500" form="delete">Delete</button>
                    <a class="btn " href="{{ route('manageproducts', $productid) }}">Edit</a>


                </div>
                <form action="{{ route('deleteproduct', $productid) }}" method="POST" class=" hidden" id="delete">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
        </div>
    </div>
</div>
