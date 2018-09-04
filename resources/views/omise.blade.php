<html>
<head>
</head>
<body>
<form name="checkoutForm" method="POST" action="/chargeOmise">
<input type="hidden" name="description" value="order ฿100.00" />
<input type="hidden" name="amount" value="400000" />
<input type="hidden" name="name" value="abc" />
  <script type="text/javascript" src="https://cdn.omise.co/omise.js"
    data-key="pkey_test_5d13mw1sktn0oad4nei"
    data-image="http://52.221.186.101/pic/add.png"
    data-frame-label="Jourlaney"
    data-button-label="Pay now"
    data-submit-label="Submit"
    data-location="no"
    data-amount="400000" 
    data-currency="thb"
    >
  </script>
  <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
  {{ csrf_field() }}
</form>

<!-- data-key="YOUR_PUBLIC_KEY" -->
</body>
</html>
