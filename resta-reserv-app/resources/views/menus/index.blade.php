<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-6 gap-x-4 place-items-center">
            @foreach ($menus as $menu )
            <div class="max-w-xs w-full mx-4 mb-2 px-4 rounded-lg shadow-lg">
              <img class="object-cover w-full h-48 rounded-lg" src="{{ Storage::url($menu->image) }}"
                alt="{{$menu->name}}" />
              <div class="px-6 py-4">
                <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $menu->name }}</h4>
                <p class="leading-normal text-gray-700 h-16">{{ $menu->description }}</p>
              </div>
              <div class="flex items-center justify-between p-4">
                <form method="POST" action="{{ route('cart.add', $menu->id) }}">
                  @csrf
                  <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                  <button type="submit" class="px-4 py-2 bg-green-600 text-green-50">Add to Cart</button>
                </form>
                <span class="text-xl text-green-600">{{ $menu->price }}</span>
              </div>
            </div>
          @endforeach
        </div>
      </div>
</x-guest-layout>