<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
 
<body onload="startPayment()">
    {{-- <h3 id="status" style="text-align: center">Click the button below to start payment</h3>
    <button onclick="startPayment()" style="display: block; margin: 20px auto; padding: 10px 20px; background-color: #3399cc; color: white; border: none; cursor: pointer;">
        Pay Now
    </button> --}}
    <form id="razorpayForm" method="POST">
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
        <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
        <input type="hidden" name="razorpay_signature" id="razorpay_signature">
        <input type="hidden" name="payment_status" id="payment_status">
        <input type="hidden" name="payment_description" id="payment_description">
        <input type="hidden" name="selectedPlanId" id="selectedPlanId" value="{{ (int) $selectedPlanId ?? '' }}">
    </form>
      
    <script>
        var rzp;
        var options = {
            "key": "{{ $key }}",
           "amount": {{ (int)$selectedPlanPrice * 100 }},
            "currency": "INR",
            "name": "{{ $user->name }}",
            "description": "Plan Purchase",
            "order_id": "{{ $payment->order_id }}",
            "handler": function(response) {
                document.getElementById("status").innerText = "Payment Successful!";
                let form = document.getElementById('razorpayForm');
                form.action = "{{ route('razorpay.success') }}";
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                document.getElementById('payment_status').value = "captured";
                form.submit();
            },
            "prefill": {
                "name": "{{ $user->name }}",
                "email": "{{ $user->email }}",
                "contact": "{{ $user->mobile }}"
            },
            "theme": {
                "color": "#3399cc"
            },
            "modal": {
                "ondismiss": function() {
                    document.getElementById("status").innerText = "Payment Cancelled!";
                    let form = document.getElementById('razorpayForm');
                    form.action = "{{ route('razorpay.cancelled') }}";
                    document.getElementById('razorpay_payment_id').value = '';
                    document.getElementById('razorpay_order_id').value = "{{ $payment->order_id }}";
                    document.getElementById('razorpay_signature').value = '';
                    document.getElementById('payment_status').value = "cancelled";
                    document.getElementById('payment_description').value = "User cancelled the payment";
                    form.submit();
                }
            }
        };

        function startPayment() {
            document.getElementById("status").innerText = "Processing Payment...";
            rzp = new Razorpay(options);
            rzp.on('payment.failed', function(response) {
                document.getElementById("status").innerText = "Payment Failed!";
                let form = document.getElementById('razorpayForm');
                form.action = "{{ route('razorpay.failed') }}";
                document.getElementById('razorpay_payment_id').value = response.error.metadata.payment_id || '';
                document.getElementById('razorpay_order_id').value = response.error.metadata.order_id ||
                    "{{ $payment->order_id }}";
                document.getElementById('razorpay_signature').value = '';
                document.getElementById('payment_status').value = "failed";
                document.getElementById('payment_description').value = response.error.description ||
                    "Payment Failed";
                form.submit();
            });

            rzp.open();
        }
    </script>

</body>

</html>
