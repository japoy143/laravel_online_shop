<x-layouts.layout>

    <div class=" px-6">
        <x-headings.section-heading>
            My Products
        </x-headings.section-heading>


        <x-layouts.product-layout>



            @foreach ($products as $product)
                <livewire:card-product :product="$product" :edit="true" :active="true" />
            @endforeach

        </x-layouts.product-layout>
    </div>

</x-layouts.layout>
