<html>  
<head>
<title>Jourlaney</title>
</head>
<body>
  Welcome to User Profile<br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo Session::get('username');
    }?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Lastname</td>
        <td>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  
</body>
</html>
