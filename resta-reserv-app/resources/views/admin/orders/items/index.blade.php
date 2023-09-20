

<x-admin-layout>
    @foreach ($items as $item)
    <div class="item">
        <p>Name: {{ $item['name'] }}</p>
        <p>Price: {{ $item['price'] }}</p>
        <!-- Other item details -->
    </div>
@endforeach
</x-admin-layout>