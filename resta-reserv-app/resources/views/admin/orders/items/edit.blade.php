<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h2 class="text-xl font-bold pb-8">Change quantity from {{$quantity}}</h2>
    <div>
        <form action="{{route('admin.items.update', ['orderId' => $orderId, 'itemId' => $itemId])}}">
            <select class="form-multiselect w-20 mt-1" name="quantity" id="quantity">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Change</button>
        </form>
    </div>
</x-admin-layout>
