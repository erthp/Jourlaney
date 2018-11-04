<html>
<body>
<form name="SendEmail" method="POST" action="/Mail">
<input type="Submit" value="Send Email">
{{ csrf_field() }}
</form>
</body>
</html>
