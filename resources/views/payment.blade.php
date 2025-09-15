<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>       
    <script src="{{ asset('website') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('website/library/js.cookie.min.js') }}"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
            "amount": {{ $amount }}, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Cloth Business", //your business name
            "description": "Test Transaction",
            "handler": function (response) {
                console.log(response);
                console.log("hello");
            },
            "image": "{{ asset('assets/images/logo.svg') }}", //The image should be a 128x128px logo
            "order_id": "{{ $id }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
            "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                "name": "{{ $name }}", //your customer's name
                {{-- "email": "rc5556662@gmail.com", --}}
                "contact": "{{$phone}}" //Provide the customer's phone number for better conversion rates 
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        
        {{-- rzp1.on('payment.failed', function (response) {
            Cookies.set('paymentFailed', '1', { expires: 1 });
            window.location.href = "{{ route('checkout') }}";
        }); --}} 
    </script>
</body>

</html>