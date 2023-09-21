<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table-total {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 100px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <div>
                <div>
                    <table class="styled-table">
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
                    <table class="styled-table">
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
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{$order->total}} Ft
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>      
        </div>
    </div>
</body>
</html>