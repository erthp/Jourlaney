<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
require_once dirname(__FILE__).'/omise/lib/Omise.php';
use OmiseTransfer;
define('OMISE_PUBLIC_KEY', 'pkey_test_5d13mw1sktn0oad4nei');
define('OMISE_SECRET_KEY', 'skey_test_5d13mw1svuw4e05c05q');
class OmiseTransferController extends Controller{
    

    

    public function transfer(Request $request){
    $transfer = OmiseTransfer::create(array(
    'amount' => 100000,
    'recipient' => 'recp_test_abc'
    ));
       echo 'Success';
    }
 
}
?>