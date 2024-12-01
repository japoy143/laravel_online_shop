<x-layouts.layout>

    <main class="mx-auto  max-w-screen-2xl space-y-10">
        {{-- heading image --}}
        <x-headings.heading-image />

        <section>
            <x-headings.section-heading>Featured Electronics</x-headings.section-heading>

            <x-layouts.product-layout>



                @foreach ($products as $product)
                    <x-cards.card-product :$product />
                @endforeach

            </x-layouts.product-layout>
        </section>

        <section>
            <x-headings.section-heading>Hot Deals</x-headings.section-heading>



            <x-layouts.product-layout>



                @foreach ($products as $product)
                    <x-cards.card-product :$product />
                @endforeach

            </x-layouts.product-layout>
        </section>


        <section>
            <x-headings.section-heading>Top Choices</x-headings.section-heading>

            <x-layouts.product-layout>



                @foreach ($products as $product)
                    <x-cards.card-product :$product />
                @endforeach

            </x-layouts.product-layout>
        </section>




    </main>

</x-layouts.layout>
