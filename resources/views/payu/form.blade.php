<!DOCTYPE html>
<html lang="en">

<head>
    <title>PayU Payment</title>
</head>

<body>
    <h3>PayU Money Payment Form</h3>
    <form action="{{ url('/payu-submit') }}" method="POST">
        @csrf
        <label>Amount</label>
        <input type="text" name="amount" required><br>

        <label>Product Info</label>
        <input type="text" name="productinfo" required><br>

        <label>First Name</label>
        <input type="text" name="firstname" required><br>

        <label>Email</label>
        <input type="email" name="email" required><br>

        <label>Phone</label>
        <input type="text" name="phone" required><br>

        <button type="submit">Pay Now</button>
    </form>
</body>

</html>
