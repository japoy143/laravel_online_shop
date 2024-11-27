@props(['productname' => '', 'description' => '', 'imageUrl' => '', 'category' => '', 'price' => ''])

<div class="card rounded-md bg-base-100 w-94 shadow-xl">
    <figure>
        <img src="{{ $imageUrl }}" alt="{{ $category }}" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $productname }}</h2>
        <p>{{ $description }}</p>
        <p>{{ $price }}$</p>
        <div class="card-actions justify-end">
            <button class="btn ">Buy Now</button>
        </div>
    </div>
</div>
