<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;
use PHPMailer;
use PHPMailer\Exception;

class AdminController extends Controller
{
    public function login(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        $hash = hash('sha512',$password);
        if($username='Admin'){
        $check = DB::table('Users')->where(['username'=>$username,'userPassword'=>$hash])->get();
        if(count($check) >0){
            Session::start();
            $req->session()->put('username', $username);
            $firstname = DB::table('Users')->select('userFirstName')->where('username',$username)->get();
            Session::put('firstname', $firstname[0]->userFirstName);
            $lastname = DB::table('Users')->select('userLastName')->where('username',$username)->get();
            Session::put('lastname', $lastname[0]->userLastName);
            return redirect('adminGetData');
        }
        else{
            echo ('Invalid Username or Password.');
        }
    }
        else{
            echo ('Invalid Username or Password.');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }

    public function getdata(){
        $countGuide = DB::table('Guide')->count();
        Session::put('countGuide', $countGuide);
        $countTourist = DB::table('Tourist')->count();
        Session::put('countTourist', $countTourist);
        $countUser = $countGuide + $countTourist;
        Session::put('countUser', $countUser);
        $countGuideTrip = DB::table('GuideTrip')->count();
        $countTouristTrip = DB::table('TouristTrip')->count();
        $countTrip = $countGuideTrip + $countTouristTrip;
        Session::put('countTrip', $countTrip);
        $queryGuide = DB::select('select Users.username, Users.userFirstName, Users.userLastName, Users.userEmail, Guide.guideLicensePic from Users join Guide on Guide.username=Users.username where Guide.guideVerification is null');
        return view('Admin/index', ['queryGuide' => $queryGuide]);
    }

    public function getdataReport(){
        $countGuide = DB::table('Guide')->count();
        Session::put('countGuide', $countGuide);
        $countTourist = DB::table('Tourist')->count();
        Session::put('countTourist', $countTourist);
        $countUser = $countGuide + $countTourist;
        Session::put('countUser', $countUser);
        $countGuideTrip = DB::table('GuideTrip')->count();
        $countTouristTrip = DB::table('TouristTrip')->count();
        $countTrip = $countGuideTrip + $countTouristTrip;
        Session::put('countTrip', $countTrip);
        $queryReport = DB::select('select distinct msg.messageId, msg.problem, msg.messageText, gt.tripName, ord.tripCost, ut.userFirstName as touristFirstName, ut.userEmail as touristEmail, ug.userFirstName as guideFirstName, ug.userEmail as guideEmail from AdminMessage msg join ChatRoom c on msg.chatRoomId=c.chatRoomId join TripOrder ord on c.chatRoomId=ord.chatRoomId join GuideTrip gt on c.guideTripId=gt.tripId join Tourist t on c.touristId=t.touristId join Guide g on c.guideId=g.guideId join Users ut on t.username=ut.username join Users ug on g.username=ug.username');
        //dd($queryReport);
        return view('Admin/report', ['queryReport' => $queryReport]);
    }

    public function guideverify(Request $req){
        $username = $req->get('username');
        $location = $req->get('location');
        $queryVerify = DB::update('update Guide set guideVerification = ?, guideLocation = ? where username = ?',[1,$location,$username]);

        $queryGuide = DB::select('select * from Users where username = ?',[$username]);
        $guideFirstName = $queryGuide[0]->userFirstName;
        $guideEmail = $queryGuide[0]->userEmail;
        //Load Composer's autoloader
        require 'PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer();                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = env('MAIL_USERNAME');                 // SMTP username
            $mail->Password = env('MAIL_PASSWORD');                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('jourlaney@gmail.com', 'Jourlaney');
            $mail->addAddress($guideEmail, $guideFirstName);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Your account has verified!';
            $mail->Body    = '<!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width"> 
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="x-apple-disable-message-reformatting">
                <title>Jourlaney Quotation</title>
                <style>
                    html,
                    body {
                        margin: 0 auto !important;
                        padding: 0 !important;
                        height: 100% !important;
                        width: 100% !important;
                    }
            
                    * {
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%;
                    }
            
            
                    div[style*="margin: 16px 0"] {
                        margin: 0 !important;
                    }
            
            
                    table,
                    td {
                        mso-table-lspace: 0pt !important;
                        mso-table-rspace: 0pt !important;
                    }
            
                    
                    table {
                        border-spacing: 0 !important;
                        border-collapse: collapse !important;
                        table-layout: fixed !important;
                        margin: 0 auto !important;
                    }
                    table table table {
                        table-layout: auto;
                    }
            
                    
                    a {
                        text-decoration: none;
                    }
            
            
                    img {
                        -ms-interpolation-mode:bicubic;
                    }
            
            
                    *[x-apple-data-detectors],  /* iOS */
                    .unstyle-auto-detected-links *,
                    .aBn {
                        border-bottom: 0 !important;
                        cursor: default !important;
                        color: inherit !important;
                        text-decoration: none !important;
                        font-size: inherit !important;
                        font-family: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                    }
            
            
                    .a6S {
                    display: none !important;
                    opacity: 0.01 !important;
                }
            
                img.g-img + div {
                    display: none !important;
                }
            
                    
                    @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                        u ~ div .email-container {
                            min-width: 320px !important;
                        }
                    }
            
                    @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                        u ~ div .email-container {
                            min-width: 375px !important;
                        }
                    }
            
                    @media only screen and (min-device-width: 414px) {
                        u ~ div .email-container {
                            min-width: 414px !important;
                        }
                    }
            
                </style>
                
                <style>
            
                
                    .button-td,
                    .button-a {
                        transition: all 100ms ease-in;
                    }
                    .button-td-primary:hover,
                    .button-a-primary:hover {
                        background: #555555 !important;
                        border-color: #555555 !important;
                    }
            
                    /* Media Queries */
                    @media screen and (max-width: 600px) {
            
                        .email-container {
                            width: 100% !important;
                            margin: auto !important;
                        }
            
            
                        .fluid {
                            max-width: 100% !important;
                            height: auto !important;
                            margin-left: auto !important;
                            margin-right: auto !important;
                        }
            
            
                        .stack-column,
                        .stack-column-center {
                            display: block !important;
                            width: 100% !important;
                            max-width: 100% !important;
                            direction: ltr !important;
                        }
            
                        .stack-column-center {
                            text-align: center !important;
                        }
            
            
                        .center-on-narrow {
                            text-align: center !important;
                            display: block !important;
                            margin-left: auto !important;
                            margin-right: auto !important;
                            float: none !important;
                        }
                        table.center-on-narrow {
                            display: inline-block !important;
                        }
            
            
                        .email-container p {
                            font-size: 17px !important;
                        }
                    }
            
                </style>
            
            
            </head>
            
            <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #c0dfd9;">
                <center style="width: 100%; background-color: #c0dfd9;">
                    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
                    </div>
                    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
                        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                    </div>
            
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: 0 auto;" class="email-container">
                        <tr>
                            <td style="background-color: #ffffff;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            Dear '.$guideFirstName.',
                                            <br><br>
                                            Welcome to Jourlaney, Your account has verified. Now you can chat and create order with tourist.
                                            <br><br>
                                            Yours faithfully,<br>
                                            Jourlaney\'s team.
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: 0 auto;" class="email-container">
                        <tr>
                            <td style="padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;">
                                <a href="http://jourlaney.com" style="color: #cccccc; text-decoration: underline; font-weight: bold;">Go to website</a>
                                <br><br>
                                Jourlaney<br><span class="unstyle-auto-detected-links">jourlaney.com</span>
                            </td>
                        </tr>
                    </table>
                </center>
            </body>
            </html>';
            $mail->CharSet = 'UTF-8';

            $mail->send();
        } catch (Exception $e) {
            echo 'Message not sent';
        }

        echo "<script>window.alert('Verified.')</script>";
        return redirect('adminGetData');


    }

    public function vote(){
        return redirect('https://seniorproject.sit.kmutt.ac.th/showproject/IT58-BU59');
    }
}
