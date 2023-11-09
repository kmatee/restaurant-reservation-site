<x-guest-layout>
    <div class="flex justify-center content-center">
        <div class="w-1/2">
            <div class="rounded-lg pt-10">
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 class="text-lg font-bold text-gray-900">Shipping info:</h2>
                            <p>
                                {{$orderDetails["last_name"]}} {{$orderDetails["first_name"]}}
                            </p>
                            <p>
                                {{$orderDetails["phone_number"]}}
                            </p>
                            <p>
                                {{$orderDetails["country"]}}, {{$orderDetails["zip_code"]}}, {{$orderDetails["address"]}}
                            </p>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-lg">
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                    
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 class="text-lg font-bold text-gray-900">Order info:</h2>
                            @foreach ($items as $item)
                            <p>
                                {{$item->name}}: {{$item->price}} Ft, Qty.: {{$item->quantity}}
                            </p>
                            @endforeach
                            <p class="font-bold">Total: {{$total}} Ft</p>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route('payment')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$orderDetails["first_name"]}}" name="first_name">
                <input type="hidden" value="{{$orderDetails["last_name"]}}" name="last_name">
                <input type="hidden" value="{{$orderDetails["phone_number"]}}" name="phone_number">
                <input type="hidden" value="{{$orderDetails["country"]}}" name="country">
                <input type="hidden" value="{{$orderDetails["zip_code"]}}" name="zip_code">
                <input type="hidden" value="{{$orderDetails["address"]}}" name="address">
                <input type="hidden" value="{{$items}}" name="items">
                <input type="hidden" value="{{$total}}" name="total">
                <button type="submit" class="mb-2 md:mb-0 px-5 py-2 text-sm shadow-sm font-medium tracking-wider bg-blue-500 text-white hover:bg-blue-600 rounded-md transition-color duration-300">Pay Now</button>
            </form>
        </div>
        
        
            
        
    </div>

</x-guest-layout>