<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Reservation</a>
            </div>
            <div class="flex flex-col">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg hidden xl:block">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Table
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Guests
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->first_name }} {{$reservation->last_name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $reservation->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation->reservation_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation->table->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation->guest_number }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                        <form
                                            method="POST"
                                            action="{{ route('admin.reservations.destroy', $reservation->id) }}"
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
                <!-- Mobile view table -->
                <div class="grid grid-cols-1 gap-4 xl:hidden">
                    @foreach ($reservations as $reservation)
                    <div class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 rounded-lg shadow">
                        <div class="space-x-3 text-xs text-gray-100 space-y-2">
                            <div class="pl-3 pt-2 text-white uppercase text-sm flex justify-between">
                                <div class="pr-2">{{ $reservation->first_name }} {{$reservation->last_name}}</div> 
                                <div class="pr-2">{{$reservation->reservation_date}}</div>
                            </div>
                            <div class="">
                                {{$reservation->email}}
                            </div>
                            <div class="flex justify-between">
                                <div class="pr-12 bottom-0">
                                    {{ $reservation->table->name }} - {{$reservation->guest_number}} guests
                                </div>
                                <div>
                                    <div class="flex space-x-2 pb-2 pr-2">
                                        <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                        <form
                                            method="POST"
                                            action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                            onsubmit="return confirm('Are you sure?');"
                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>      
        </div>
    </div>
</x-admin-layout>