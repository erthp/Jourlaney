<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use PHPMailer;
use PHPMailer\Exception;
use Carbon\Carbon;
require_once dirname(__FILE__).'/omise/lib/Omise.php';
use OmiseTransfer;
define('OMISE_PUBLIC_KEY', 'pkey_test_5d13mw1sktn0oad4nei');
define('OMISE_SECRET_KEY', 'skey_test_5d13mw1svuw4e05c05q');

class OrderController extends Controller
{
    public function CreateOrder(Request $request){
    
        $chatRoomId = $request->input('chatRoomId');
        $agreementDetails = $request->input('tripDetails');
        $tripStartDate = $request->input('startDate');
        $tripCost = $request->input('tripCost');
        $tripCostWithVat = ($tripCost * 83) / 100;

        $today = Carbon::today('Asia/Bangkok')->isoFormat('DD MMMM YYYY');
        $customer = DB::select("select u.userLastName, u.userFirstName, u.userEmail from TripOrder ord join ChatRoom c on ord.chatRoomId=c.chatRoomId join Tourist t on c.touristId=t.touristId join Users u on t.username=u.username where c.chatRoomId=".$chatRoomId);
        $order = DB::select("select gt.tripName from GuideTrip gt join ChatRoom c on gt.tripId=c.guideTripId where c.chatRoomId=".$chatRoomId);
        
        $customerFirstName = $customer[0]->userFirstName;
        $customerLastName = $customer[0]->userLastName;
        $customerEmail = $customer[0]->userEmail;
        $orderTripName = $order[0]->tripName;
        $orderTripCost = $tripCost;
        
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
            $mail->addAddress('panot.1997@mail.kmutt.ac.th', $customerFirstName);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Jourlaney Quotation:'.$orderTripName;
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
                                            Dear '.$customerFirstName.',
                                            <br><br>
                                            We would remind you that the balance of THB'.$orderTripCost.' is with in 1 day. <br>Please give this matter your attention and let us have a remittance by return. <br>If the payment is made, please disregard this reminder and accept our thanks.
                                            <br><br>
                                            Yours faithfully,<br>
                                            Jourlaney\'s team.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            <h1 style="margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;text-align: center;">Quotation</h1>
                                            <p style="margin: 0 0;">Jourlaney</p>
                                            <p style="margin: 0 0 10px;font-size: 12px;">jourlaney.com</p>
                                            <p style="margin: 0 0 10px;">Quotation Information</p>
                                            <ul style="padding: 0; margin: 0; list-style-type: disc;">
                                                <li style="margin:0 0 10px 20px;" class="list-item-first">Quotation No.: '.$chatRoomId.'</li>
                                                <li style="margin:0 0 10px 20px;" class="list-item-last">Date: '.$today.'</li>
                                            </ul>
                                            <p style="margin: 0 0 10px;">Customer Information</p>
                                            <ul style="padding: 0; margin: 0; list-style-type: disc;">
                                                <li style="margin:0 0 10px 20px;" class="list-item-first">Customer Name: '.$customerLastName.', '.$customerFirstName.'</li>
                                                <li style="margin:0 0 10px 20px;" class="list-item-last">Customer Email: '.$customerEmail.'</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td aria-hidden="true" height="40" style="font-size: 0px; line-height: 0px;">
                                &nbsp;
                            </td>
                        </tr>
            
                        <tr>
                            <td style="background-color: #ffffff;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            No.
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            Item(s)
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            Qty.
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            Cost/Qty.
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            Total
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            1
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            '.$orderTripName.'
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            1
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            THB '.$orderTripCost.'.00
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            THB '.$orderTripCost.'.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;background-color: #CCCCCC;">
                                            Total
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;background-color: #CCCCCC;">
                                            
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;background-color: #CCCCCC;">
                                            
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;background-color: #CCCCCC;">
                                            
                                        </td>
                                        <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;background-color: #CCCCCC;">
                                            THB '.$orderTripCost.'.00
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #ffffff;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            You must to pay full trip cost for confirm your trip with guide.
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
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message not sent';
        }

        $query = DB::update('update TripOrder set status = ?, agreementDetails = ?, tripStartDate = ?, tripCost = ?, tripCostWithVat = ? where chatRoomId = ?',["Transfer",$agreementDetails,$tripStartDate,$tripCost,$tripCostWithVat,$chatRoomId]);
        return app('App\Http\Controllers\ChatController')->ShowChat($chatRoomId);
    }

    public function ConfirmOrder(Request $request){
        
        $chatRoomId = $request->input('chatRoomId');

        $query = DB::update('update TripOrder set status = ? where chatRoomId = ?',["Review",$chatRoomId]);
        
        $guideBankAccountQuery = DB::select('select bankAccountNumber from GuideBankAccount gba join ChatRoom cr on gba.guideId=cr.guideId where cr.chatRoomId ='.$chatRoomId);
        $transferCost = DB::select('select tripCostWithVat from TripOrder where chatRoomId ='.$chatRoomId);
        $costVat = ($transferCost[0]->tripCostWithVat)."00";
        $intAmount = (int)$costVat;

        $guideBankAccount = $guideBankAccountQuery[0]->bankAccountNumber;
        $transfer = OmiseTransfer::create(array(
             'amount' => $intAmount,
             'recipient' => $guideBankAccount
             ));
        return app('App\Http\Controllers\ChatController')->ShowChat($chatRoomId);
    
    }

    public function CancelOrder(Request $request){
        
        $chatRoomId = $request->input('chatRoomId');
        $query = DB::update('update TripOrder set status = ? where chatRoomId = ?',["Chat",$chatRoomId]);
        
        return app('App\Http\Controllers\ChatController')->ShowChat($chatRoomId);
    
    }

    public function RateReview(Request $request){
        
        $ratingValue = $request->input('rating');

        if($ratingValue == "5"){
            $rating = 5;
        }else if($ratingValue == "4 and a half"){
            $rating = 4.5;
        }else if($ratingValue == "4"){
            $rating = 4;
        }else if($ratingValue == "3 and a half"){
            $rating = 3.5;
        }else if($ratingValue == "3"){
            $rating = 3;
        }else if($ratingValue == "2 and a half"){
            $rating = 2.5;
        }else if($ratingValue == "2"){
            $rating = 2;
        }else if($ratingValue == "1 and a half"){
            $rating = 1.5;
        }else if($ratingValue == "1"){
            $rating = 1;
        }else if($ratingValue == "0 and a half"){
            $rating = 0.5;
        }else{
            $rating = 0;
        }

        $review = $request->input('review');
        $chatRoomId = $request->input('chatRoomId');

        if(Session::get('guideid')){
            $queryRateReview = DB::update('update TripOrder set touristRating = ?, touristReview = ? where chatRoomId = ?',[$rating, $review, $chatRoomId]);
            
        }elseif(Session::get('touristid')){
            $queryRateReview = DB::update('update TripOrder set guideRating = ?, guideReview = ? where chatRoomId = ?',[$rating, $review, $chatRoomId]);
        }

        return app('App\Http\Controllers\ChatController')->ShowChat($chatRoomId);
    
    }
}
