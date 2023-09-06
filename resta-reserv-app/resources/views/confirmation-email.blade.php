<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Order Confirmation</h2>
    <p>Thank you for your order!</p>
    <p>Here is you reservation info:</p>
    <table>
        <tr>
            <td>Name: </td>
            <td>{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
        </tr>
        <tr>
            <td>Telefone number: </td>
            <td>{{ $reservation->tel_number }}</td>
        </tr>
        <tr>
            <td>Date: </td>
            <td>{{ $reservation->reservation_date }}</td>
        </tr>
        <tr>
            <td>Number of guests: </td>
            <td>{{ $reservation->guest_number }}</td>
        </tr>
    </table>
</body>
</html>
