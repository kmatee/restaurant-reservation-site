<x-guest-layout>
    <div class="flex justify-between">
        <div class="md:w-1/2">
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
        </div>
        
        <div class="max-w-sm mx-auto mt-10 bg-white rounded-md shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-red-400 to-green-500 text-white">
                <h1 class="text-lg font-bold">Credit Card</h1>
            </div>
            <div class="px-6 py-4">
        
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="card-number">
                        Card Number
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="card-number" type="text" placeholder="**** **** **** ****">
                </div>
        
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="expiration-date">
                        Expiration Date
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="expiration-date" type="text" placeholder="MM/YY">
                </div>
        
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="cvv">
                        CVV
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cvv" type="text" placeholder="***">
                </div>
        
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="cvv">
                        Cardholder Name
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Full Name">
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
                    <button type="submit" class="mb-2 md:mb-0 px-5 py-2 text-sm shadow-sm font-medium tracking-wider bg-blue-500 text-blue-50 hover:bg-blue-600 rounded-md">Pay Now</button>
                </form>
            </div>
        </div>
        
    </div>

</x-guest-layout>