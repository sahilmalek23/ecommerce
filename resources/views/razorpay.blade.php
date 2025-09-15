<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RazorPay</title>
</head>
<body>
    <h1>Payment</h1>
    <form method="post" action="{{route('payment')}}">
        @csrf
        Amount <input type="text" name="amount">
        <button type="submit">Pay</button>
    </form>
</body>
</html>