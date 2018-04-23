<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionLoginController extends Controller
{
    public function SessionLogin(){
session_start(); // เปิด session ก่อนครับ
$username=$_POST['username'];
$userPassword=$_POST['userPassword'];
$connect=mysql_connect("localhost","root","") or Die("Cannot connect to server");
$sql="select * from Users where username='$username' and userPassword='$userPassword'";
$query=mysql_query($sql,$connect); 
$check=mysql_num_rows($query);

    if($check==1){ // ถ้า check==1 แสดงว่า Login ถูกครับ
                // ทำการเก็บ session ครับ
$_SESSION['username']=$userName;
$_SESSION['userpassword']=$userPassword;

}
else{
echo "Login ไม่สำเร็จ";
}


}
}
?>