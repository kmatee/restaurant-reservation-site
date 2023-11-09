<x-guest-layout>
    <div class="container w-full px-6 py-6 mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-6 gap-x-4 place-items-center">
            @foreach ($categories as $category)
            <div class="max-w-xs w-full mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full object-cover h-48 rounded-lg" src="{{ Storage::url($category->image) }}"
                  alt="Image" />
                <div class="px-6 py-4">

                  <a href="{{ route('categories.show', $category->id) }}">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-center text-green-600 hover:text-green-500 transition-color duration-300 uppercase ">{{ $category->name }}</h4>
                  </a>
                </div>
              </div>
            @endforeach
        </div>
      </div>
</x-guest-layout>