

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex pb-2">
        <a href="{{ route('admin.orders.index') }}"
            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back to orders
        </a>
    </div>
    <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400 rouded-lg hidden sm:block">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Item Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-3 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item['name']}}
                </th>
                <td class="px-6 py-4">
                    {{$item['price']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$item['quantity']}}
                </td>
                <td class="px-3 py-4">
                    <div class="flex space-x-2">
                        <a href="{{route('admin.items.edit',['orderId' => $order->id, 'itemId' => $item["id"]])}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                        <form
                            method="POST"
                            action="{{route('admin.items.delete', ['orderId' => $order->id, 'itemId' => $item["id"]])}}"
                            onsubmit="return confirm('Are you sure?');"
                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Mobile view table -->
    <div class="grid grid-cols-1 gap-4 md:hidden sm:hidden">
        @foreach ($items as $item)
        <div class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 rounded-lg shadow">
            <div class="space-x-3 text-xs text-gray-100 space-y-2">
                <div class="pl-3 pt-2 text-white uppercase text-sm flex justify-between">
                    <div>{{ $item["name"] }} - <span class="lowercase">{{$item["quantity"]}} pcs</span></div>
                    <div class="pr-2">{{ $item["price"] }} Ft</div>
                </div>
                <div class="flex space-x-2 justify-end pr-2 pb-2">
                    <a href="{{route('admin.items.edit',['orderId' => $order->id, 'itemId' => $item["id"]])}}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                    <form
                        method="POST"
                        action="{{route('admin.items.delete', ['orderId' => $order->id, 'itemId' => $item["id"]])}}"
                        onsubmit="return confirm('Are you sure?');"
                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</x-admin-layout>