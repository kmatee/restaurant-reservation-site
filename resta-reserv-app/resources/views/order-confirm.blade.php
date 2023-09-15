<x-guest-layout>
  {{$items}}
  {{$num_of_items}}
  <div class="h-screen bg-gray-100 pt-20">
    <h1 class="mb-10 text-left pl-20 text-2xl font-bold">Order summary</h1>
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
                  <p class="h-8 w-20 border bg-white text-center text-xs outline-none p-2">Qty.: {{ $item->quantity }}</p>
                </div>
                <div class="flex items-center space-x-4">
                  <p class="text-sm">{{ $item->price * $item->quantity }} Ft</p>
                </div>
          </div>
        </div>
      </div>
     @endforeach
     <div class="flex justify-between">
         <a href="{{ route('cart.index') }}" class="text-sm underline text-blue-500 left-0 top-0">Go back to cart</a>
         <h2 class="mb-10 text-2xl text-right font-bold">Total: {{ $total }} Ft</h2>
     </div>
  </div>
  <!-- component -->
  <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
     <div class="grid  gap-8 grid-cols-1">
        <div class="flex flex-col ">
           <div class="mt-5">
              <form action="{{route('order-confirm')}}" method="POST">
                @csrf
              <div class="form">
                 <div class="md:space-y-2 mb-3">
                    <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                       <div class="mb-3 space-y-2 w-full text-xs">
                          <label class="font-semibold text-gray-600 py-2">First  Name <abbr title="required">*</abbr></label>
                          <input placeholder="First Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="first_name" id="first_name">
                          <p class="text-red text-xs hidden">Please fill out this field.</p>
                       </div>
                       <div class="mb-3 space-y-2 w-full text-xs">
                          <label class="font-semibold text-gray-600 py-2">Last Name <abbr title="required">*</abbr></label>
                          <input placeholder="Last Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="last_name" id="last_name">
                          <p class="text-red text-xs hidden">Please fill out this field.</p>
                       </div>
                    </div>
                    <label class=" font-semibold text-gray-600 text-xs py-2">Phone number<abbr title="required">*</abbr></label>
                    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                       <input type="tel" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-1 h-10 border-grey-light rounded-lg rounded-l-1 px-3 relative focus:border-blue focus:shadow" placeholder="(+36...)" name="phone_number">
                    </div>
                 </div>
                 <div class="mb-3 space-y-2 w-full text-xs">
                    <label class="font-semibold text-gray-600 py-2">Address<abbr title="required">*</abbr></label>
                    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                       <input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-1 h-10 border-grey-light rounded-lg rounded-l-1 px-3 relative focus:border-blue focus:shadow" placeholder="City, address" name="address">
                    </div>
                 </div>
                 <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                    <div class="w-full flex flex-col mb-3">
                       <label class="font-semibold text-gray-600 py-2">ZIP Code<abbr title="required">*</abbr></label>
                       <input placeholder="ZIP" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="number" name="zip_code" id="zip_code">
                    </div>
                    <div class="w-full flex flex-col mb-3">
                       <label class="font-semibold text-gray-600 py-2">Country<abbr title="required">*</abbr></label>
                       <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" name="country" id="country">
                          <option value="Hungary">Hungary</option>
                          <option value="Germany">Germany</option>
                          <option value="France">France</option>
                          <option value="Netherlands">Netherlands</option>
                       </select>
                       <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                    </div>
                 </div>
                 <div class="flex-auto w-full mb-1 text-xs space-y-2">
                    <label class="font-semibold text-gray-600 py-2">Additional information for shipping</label>
                    <textarea name="message" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Enter extra information" spellcheck="false"></textarea>
                 </div>
                 <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                    asterisk <abbr title="Required field">*</abbr>
                 </p>
                 <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                    <button type="submit" class="mb-2 md:mb-0 px-5 py-2 text-sm shadow-sm font-medium tracking-wider bg-blue-500 text-blue-50 hover:bg-blue-600 rounded-md">Confirm</button>
                 </div>
              </div>
            </form>
           </div>
        </div>
     </div>
  </div>
</x-guest-layout>