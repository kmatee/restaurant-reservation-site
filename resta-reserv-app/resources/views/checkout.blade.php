<x-guest-layout>
    <div class="rounded-lg md:w-1/3 pt-10">
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
    <div class="rounded-lg md:w-1/3">
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
    
</x-guest-layout>