<html>
<head>
</head>
<body>
<form name="checkoutForm" method="POST" action="/transferOmise">
<input type="submit" name="checkout" />

  {{ csrf_field() }}
</form>

<!-- data-key="YOUR_PUBLIC_KEY" -->
</body>
</html>