<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
        
        require_once dirname(__FILE__).'/omise/lib/Omise.php';
        use OmiseCharge; 
        
  
        define('OMISE_PUBLIC_KEY', 'pkey_test_5d13mw1sktn0oad4nei');
        define('OMISE_SECRET_KEY', 'skey_test_5d13mw1svuw4e05c05q');
      
        class OmiseCheckOutController extends Controller
{  
       public function checkout(Request $request){
        $name = $request->input('name');
        $amount = $request->input('amount');
        
        $charge = OmiseCharge::create(array(
        'amount' => $amount,
        'currency' => 'thb',
        'card' => $_POST["omiseToken"]
        ));

        //return redirect('index');

        if ($charge['status'] == 'successful') {
        echo 'Success';
        } else {
        echo 'Fail';
        }

        
            }
}
