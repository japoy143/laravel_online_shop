<x-layouts.layout>

    <main class="mx-auto  max-w-screen-2xl space-y-10">
        {{-- heading image --}}
        <x-headings.heading-image />

        <section>
            <x-headings.section-heading>Featured Electronics</x-headings.section-heading>
            @php
                $products = [
                    [
                        'productname' => 'Shoes',
                        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ',
                        'imageUrl' => 'resources/images/shoes1.jpg',
                        'category' => 'Shoes',
                        'price' => '200',
                    ],
                    [
                        'productname' => 'Headphone',
                        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ',
                        'imageUrl' => 'resources/images/headphone1.jpg',
                        'category' => 'Headphone',
                        'price' => '150',
                    ],
                    [
                        'productname' => 'Laptop',
                        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                        'imageUrl' => 'resources/images/laptop1.jpg',
                        'category' => 'Laptop',
                        'price' => '700',
                    ],
                    [
                        'productname' => 'Bag',
                        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                        'imageUrl' => 'resources/images/bag1.jpg',
                        'category' => 'Bag',
                        'price' => '90',
                    ],

                    [
                        'productname' => 'Laptop',
                        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                        'imageUrl' => 'resources/images/laptop2.jpg',
                        'category' => 'Laptop',
                        'price' => '500',
                    ],
                    [
                        'productname' => 'Bag',
                        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                        'imageUrl' => 'resources/images/bag2.jpg',
                        'category' => 'Bag',
                        'price' => '190',
                    ],
                ];
            @endphp
            <x-layouts.product-layout>


                @foreach ($products as $product)
                    <x-cards.card-product productname="{{ $product['productname'] }}"
                        description="{{ $product['description'] }}" imageUrl="{{ Vite::asset($product['imageUrl']) }}"
                        price="{{ $product['price'] }}" category="{{ $product['category'] }}" />
                @endforeach

            </x-layouts.product-layout>
        </section>

        <section>
            <x-headings.section-heading>Hot Deals</x-headings.section-heading>



            <x-layouts.product-layout>


                @foreach ($products as $product)
                    <x-cards.card-product productname="{{ $product['productname'] }}"
                        description="{{ $product['description'] }}" imageUrl="{{ Vite::asset($product['imageUrl']) }}"
                        price="{{ $product['price'] }}" category="{{ $product['category'] }}" />
                @endforeach

            </x-layouts.product-layout>
        </section>


        <section>
            <x-headings.section-heading>Top Choices</x-headings.section-heading>

            <x-layouts.product-layout>


                @foreach ($products as $product)
                    <x-cards.card-product productname="{{ $product['productname'] }}"
                        description="{{ $product['description'] }}" imageUrl="{{ Vite::asset($product['imageUrl']) }}"
                        price="{{ $product['price'] }}" category="{{ $product['category'] }}" />
                @endforeach

            </x-layouts.product-layout>
        </section>




    </main>

</x-layouts.layout>
