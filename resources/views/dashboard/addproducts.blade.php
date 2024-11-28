<x-layouts.layout>




    <div class=" px-6">
        <form method="POST" action="{{ route('addproducts.store', Auth::user()->id) }}" enctype="multipart/form-data">

            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Add New Product</h2>



                    {{-- Product name --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Product
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="productname" id="productname"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            </div>
                            @error('productname')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Category in list make it in json in insertion must be separated with comma --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Category
                                <span class=" text-gray-500 font-normal">(Must be separated in comma )</span></label>
                            <div class="mt-2">
                                <input type="text" name="category" id="category"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            </div>
                            @error('category')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                    {{-- price --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Price
                            </label>
                            <div class="mt-2">
                                <input type="text" name="price" id="price"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            </div>

                            @error('price')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                    {{-- description --}}

                    <div class="mt-10  w-full md:w-3/4">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                        </div>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- image url file input --}}
                    <div class="mt-10  w-full md:w-3/4">
                        <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Product
                            Image</label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600">
                                    <label for="imageUrl"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-black focus-within:outline-none focus-within:ring-2  focus-within:ring-offset-2 hover:text-black/60">
                                        <span>Upload a file</span>
                                        <input id="imageUrl" name="imageUrl" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                        @error('imageUrl')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6 w-full md:w-3/4">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>


</x-layouts.layout>
