<!DOCTYPE html>
<html lang="en">

<head>
    <title>Redirecting to PayUMoney</title>
</head>

<body onload="document.getElementById('payuForm').submit();">

    <h3>Redirecting to PayUMoney...</h3>
    <form id="payuForm" action="{{ $endpoint }}" method="POST">
        @foreach ($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <button type="submit">Click here if not redirected</button>
    </form>
</body>

</html>
