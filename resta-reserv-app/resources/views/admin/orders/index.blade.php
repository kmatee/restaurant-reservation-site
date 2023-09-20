<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Country
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Zip Code
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Items
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Order Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->first_name }} {{$order->last_name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->phone_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->country }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->zip_code }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->address }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('admin.items.index', $order->id)}}" class="underline hover:text-white">Items</a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->total }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                        <form
                                            method="POST"
                                            action="{{ route('admin.orders.destroy', $order->id) }}"
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
                </div>
            </div>      
        </div>
    </div>
</x-admin-layout>