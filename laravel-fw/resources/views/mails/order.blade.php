<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
<style>
    table, th, td {
        border-collapse: collapse;
    }
</style>
</head>
<body>
    <h3>Confirmtion Email</h3>
    <table style="display: table-cell;">
        <tr>
            <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; width: 200px;">Product Name</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;  text-align: center; width: 200px;">{{ $product->name }}</td> 
        </tr>
        @endforeach
    </table>
    <table style="display: table-cell;">
        <tr>
            <th style="border: 1px solid; width: 200px;">Quantity</th>
            <th style="border: 1px solid; width: 200px;">Price</th>
        </tr>
        @foreach($orderproducts as $value)
        <tr style="text-align: center;">
            <td style="border: 1px solid;">{{ $value->quantity }}</td>
            <td style="border: 1px solid;">{{ $value->price }}</td>
        </tr>        
        @endforeach
    </table><br>
    <h4>Total amount to pay: $<span>{{ $order->total_price }}</span></h4>
</body>
</html>

