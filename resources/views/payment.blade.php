<!DOCTYPE html>
<html lang="en">
<head>
    <title>PayUMoney Payment</title>
</head>
<body>
    
    <h3>Redirecting to PayUMoney...</h3>
    <form id="payuForm" action="{{ $endpoint }}" method="POST">
        @csrf
        @foreach($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>
    <script>
        document.getElementById('payuForm').submit();
    </script>
</body>
</html>