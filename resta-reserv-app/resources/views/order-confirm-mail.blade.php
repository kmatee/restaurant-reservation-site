<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
</head>
<body>
    <div>
        <div>
            <div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Phone Number
                                </th>
                                <th>
                                    Country
                                </th>
                                <th>
                                    Zip Code
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Order Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    {{ $order->first_name }} {{$order->last_name}}
                                </th>
                                <td>
                                    {{ $order->phone_number }}
                                </td>
                                <td>
                                    {{ $order->country }}
                                </td>
                                <td>
                                    {{ $order->zip_code }}
                                </td>
                                <td>
                                    {{ $order->address }}
                                </td>
                                <td>
                                    {{ $order->created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    Item Name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($order->items) as $item)
                            <tr>
                                <th>
                                    {{$item->name}}
                                </th>
                                <td>
                                    {{$item->price}}
                                </td>
                                <td>
                                    {{$item->quantity}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>      
        </div>
    </div>
</body>
</html>