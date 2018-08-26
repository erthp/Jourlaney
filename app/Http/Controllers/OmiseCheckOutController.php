<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OmiseCheckOutController extends Controller
{
    public function checkout(Request $req){
        require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
        //อาจจะผิดเพราะเรียกใช้ไฟล์ผิด?
        
        // define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
        // define('OMISE_SECRET_KEY', 'SECRET_KEY');
        
        define('OMISE_PUBLIC_KEY', 'pkey_test_5d13mw1sktn0oad4nei');
        define('OMISE_SECRET_KEY', 'skey_test_5d13mw1svuw4e05c05q');

        $charge = OmiseCharge::create(array(
        'amount' => 10025,
        'currency' => 'thb',
        'card' => $_POST["omiseToken"]
        ));

        if ($charge['status'] == 'successful') {
        echo 'Success';
        } else {
        echo 'Fail';
        }

        print('<pre>');
        print_r($charge);
        print('</pre>');
            }
}
