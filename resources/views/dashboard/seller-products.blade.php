<x-layouts.layout>

    <div class=" px-6">
        <x-headings.section-heading>
            My Products
        </x-headings.section-heading>


        <x-layouts.product-layout>



            @foreach ($products as $product)
                <x-cards.card-product" :$product :active="true" :edit="true" />
            @endforeach

        </x-layouts.product-layout>
    </div>

</x-layouts.layout>
