<html>
<head>
<title>Test Email</title>
</head>
<body>
<?php
require_once('PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl"; //ตรงส่วนนี้ผมไม่แน่ใจ ลองเปลี่ยนไปมาใช้งานได้
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;  //ตรงส่วนนี้ผมไม่แน่ใจ ลองเปลี่ยนไปมาใช้งานได้
	$mail->isHTML(true);
	$mail->CharSet = "utf-8"; //ตั้งเป็น UTF-8 เพื่อให้อ่านภาษาไทยได้
	$mail->Username = "่jourlaney@gmail.com"; //ให้ใส่ Gmail ของคุณเต็มๆเลย
	$mail->Password = "jourlaney123"; // ใส่รหัสผ่าน
	$mail->SetFrom = ('knick6@hotmail.com'); //ตั้ง email เพื่อใช้เป็นเมล์อ้างอิงในการส่ง ใส่หรือไม่ใส่ก็ได้ เพราะผมก็ไม่รู้ว่ามันแาดงให้เห็นตรงไหน
	$mail->FromName = "Hello"; //ชื่อที่ใช้ในการส่ง
	$mail->Subject = "Email Test";  //หัวเรื่อง emal ที่ส่ง
	$mail->Body = "แจ้งรายละเอียดค่าใช้จ่ายทั้งหมดที่ต้องเสียสำหรับทริปนี้</b>"; //รายละเอียดที่ส่ง
	$mail->AddAddress('kasidis.sr@mail.kmutt.ac.th','Mr.Knack'); //อีเมล์และชื่อผู้รับ
	
	//ส่วนของการแนบไฟล์ ซึ่งทดสอบแล้วแนบได้จริงทั้งไฟล์ .rar , .jpg , png ซึ่งคงมีหลายนามสกุลที่แนบได้
	//$mail->AddAttachment("files/1.rar");
	//$mail->AddAttachment("files/2.rar");
	//$mail->AddAttachment("files/1.jpg");
	//$mail->AddAttachment("files/2.png");


	//ตรวจสอบว่าส่งผ่านหรือไม่
	if ($mail->Send()){
	echo "ส่งสำเร็จ";
	}else{
	echo "ส่งไม่สำเร็จ";
    }
?>
</body>
</html>