<x-layouts.layout>

    <div class=" px-6">
        <x-headings.section-heading>
            My Products
        </x-headings.section-heading>


        <x-layouts.product-layout>



            @foreach ($products as $product)
                <x-cards.card-product productid="{{ $product->id }}" productname="{{ $product->productname }}"
                    description="{{ $product->description }}"
                    imageUrl="{{ Vite::asset('storage/app/' . $product->imageUrl) }}" price="{{ $product->price }}"
                    category="{{ $product->category }}" :active="true" stocks="{{ $product->stocks }}"
                    :edit="true" />
            @endforeach

        </x-layouts.product-layout>
    </div>

</x-layouts.layout>
