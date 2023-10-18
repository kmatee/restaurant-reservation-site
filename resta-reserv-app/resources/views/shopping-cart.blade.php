<x-guest-layout>
    <div class="h-screen bg-gray-100 pt-20">
      @if(!empty($items))
      <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
      <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
            @foreach ($items as $item)
          <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
            <img src="{{asset($item->attributes->image)}}" alt="product-image" class="w-full rounded-lg sm:w-40" />
            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
              <div class="mt-5 sm:mt-0">
                <h2 class="text-lg font-bold text-gray-900">{{$item->name }}</h2>
              </div>
              <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                <div class="flex items-center border-gray-100">
                    <a href="{{route('cart.decrease', $item->id)}}">
                        <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                    </a>
                  <p class="h-8 w-8 border bg-white text-center text-xs outline-none p-2">{{ $item->quantity }}</p>
                  <a href="{{route('cart.increase', $item->id)}}">
                    <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>    
                </a>
                </div>
                <div class="flex items-center space-x-4">
                  <p class="text-sm">{{ $item->price * $item->quantity }} Ft</p>
                  <a href="{{ route('cart.remove', $item->id) }}">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <a href="{{ route('home') }}" class="text-sm underline text-blue-500">Go back to shopping</a>
        </div>
        <!-- Sub total -->
        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
          <div class="mb-2 flex justify-between">
            <p class="text-gray-700">Subtotal</p>
            <p class="text-gray-700">{{$total}} Ft</p>
          </div>
          
          <hr class="my-4" />
          <div class="flex justify-between">
            <p class="text-lg font-bold">Total</p>
            <div class="">
              <p class="mb-1 text-lg font-bold">{{$total}} Ft</p>
              <p class="text-sm text-gray-700">+ shipping</p>
            </div>
          </div>
          <a href="{{route('checkout')}}">
            <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
          </a>
        </div>
      </div>
      @else
      <div class="static pt-12 text-center">
        <div class="inline-block rounded-lg bg-gray-100 p-12">
          <h2 class="text-xl font-bold">Your shopping cart is empty!</h2>
          <a href="{{ route('home') }}" class="text-sm underline text-blue-500">Go back to shopping</a>
        </div>
    </div>
    @endif
    </div>
</x-guest-layout>