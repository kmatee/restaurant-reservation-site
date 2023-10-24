<x-guest-layout>
    <!-- Main Hero Content -->
    <div
      class="container max-w-lg px-4 py-32 items-center mx-auto text-center bg-center bg-no-repeat bg-cover md:max-w-none md:text-center sm:max-v-none sm:text-center"
      style="background-image: url('https://eatkc.com/wp-content/uploads/2019/01/Italian.jpg')">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white to-white md:text-center sm:leading-none lg:text-4xl">
        <span class="inline md:block">Welcome To Gustavo Pizzeria webpage</span>
      </h1>
      <div class="mx-auto mt-2 text-white md:text-center lg:text-lg">
        The best family owned Italian Resaturant in Budapest.
      </div>
      <div class="grid place-items-center">
        <div class="md:w-auto pt-12">
          <a href="{{ route('reservations.step.one') }}" type="button"
            class="px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
            Make Reservation
          </a>
        </div>
      </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-32 bg-white md:px-0">
      <div class="fixed top-80 left-10 flex">
        <a href="{{ route('cart.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve"
                        class="w-6 h-6">
                        <defs>
                        </defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                            <path d="M 72.975 58.994 H 31.855 c -1.539 0 -2.897 -1.005 -3.347 -2.477 L 15.199 13.006 H 3.5 c -1.933 0 -3.5 -1.567 -3.5 -3.5 s 1.567 -3.5 3.5 -3.5 h 14.289 c 1.539 0 2.897 1.005 3.347 2.476 l 13.309 43.512 h 36.204 l 10.585 -25.191 h -6.021 c -1.933 0 -3.5 -1.567 -3.5 -3.5 s 1.567 -3.5 3.5 -3.5 H 86.5 c 1.172 0 2.267 0.587 2.915 1.563 s 0.766 2.212 0.312 3.293 L 76.201 56.85 C 75.655 58.149 74.384 58.994 72.975 58.994 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <circle cx="28.88" cy="74.33" r="6.16" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
                            <circle cx="74.59" cy="74.33" r="6.16" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
                            <path d="M 62.278 19.546 H 52.237 V 9.506 c 0 -1.933 -1.567 -3.5 -3.5 -3.5 s -3.5 1.567 -3.5 3.5 v 10.04 h -10.04 c -1.933 0 -3.5 1.567 -3.5 3.5 s 1.567 3.5 3.5 3.5 h 10.04 v 10.04 c 0 1.933 1.567 3.5 3.5 3.5 s 3.5 -1.567 3.5 -3.5 v -10.04 h 10.041 c 1.933 0 3.5 -1.567 3.5 -3.5 S 64.211 19.546 62.278 19.546 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
            </svg>
        </a>
        @if (isset($num_of_items) && $num_of_items > 0)
        <span class="bg-red-100 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-white">{{$num_of_items}}</span>
        @endif
      </div>
      <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
          <div class="w-full md:w-1/2 md:px-3">
            <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
              <!-- <h1
              class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
            > -->
              <h3 class="text-xl">OUR STORY
              </h3>
              <h2 class="text-4xl text-green-600">Welcome</h2>
              <!-- </h1> -->
              <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                The restaurant was founded in 1968 by my immigrant grandfather. It took him and our family a lot of hard work to get to this point.
                Now we are one of the most awarded Italian restaurant in Budapest!
              </p>
              
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
              <img src="https://cdn.pixabay.com/photo/2017/08/03/13/30/people-2576336_960_720.jpg" />
            </div>
          </div>
        </div>
      </div>
    </section>
    @if($specials)
    <section class="mt-8 bg-white">
      <div class="mt-4 text-center">
        <h3 class="text-2xl font-bold">Our Menu</h3>
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
          TODAY'S SPECIALITY</h2>
      </div>
      <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6 place-items-center">
        
        @foreach ($specials->menus as $menu )
          <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
            <img class="w-full h-48" src="{{ Storage::url($menu->image) }}"
              alt="Image" />
            <div class="px-6 py-4">
              <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $menu->name }}</h4>
              <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
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
    </section>
    @endif


    <section class="pt-4 pb-12 px-8 md: bg-gray-800">
      <div class="my-16 text-center">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
          Reviews </h2>
        <p class="text-xl text-white">Some reviews from our dear customers</p>
      </div>
      <div class="grid gap-2 lg:grid-cols-3 place-items-center">
        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
          <div class="flex justify-center -mt-16">
            <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
              src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
          </div>
          <div>
            <h2 class="text-3xl font-semibold text-gray-800">Pizza</h2>
            <p class="mt-2 text-gray-600">I had one of the best pizza of my life at Gustavos. I can only recommend this place!</p>
          </div>
          <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-green-500">John Doe</a>
          </div>
        </div>
        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
          <div class="flex justify-center -mt-16">
            <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
              src="https://cdn.pixabay.com/photo/2018/01/04/21/15/young-3061652__340.jpg">
          </div>
          <div>
            <h2 class="text-3xl font-semibold text-gray-800">Pasta</h2>
            <p class="mt-2 text-gray-600">The homemade pastas here are excellent. It's just like my grandma's!</p>
          </div>
          <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-green-500">Erica Wells</a>
          </div>
        </div>
        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
          <div class="flex justify-center -mt-16">
            <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
              src="https://cdn.pixabay.com/photo/2018/01/18/17/48/purchase-3090818__340.jpg">
          </div>
          <div>
            <h2 class="text-3xl font-semibold text-gray-800">Atmosphere</h2>
            <p class="mt-2 text-gray-600">The atmosphere is just amazing at Gustavos. Very cozy and warm. The service was excellent too!</p>
          </div>
          <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-green-500">Melinda Watson</a>
          </div>
        </div>
      </div>
    </section>
</x-guest-layout>