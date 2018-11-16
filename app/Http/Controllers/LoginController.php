<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;

class LoginController extends Controller
{
    public function login(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        $hash = hash('sha512',$password);

        $check = DB::table('Users')->where(['username'=>$username,'userPassword'=>$hash])->get();
        if(count($check) >0){
            Session::start();
            $req->session()->put('username', $username);
            $firstname = DB::table('Users')->select('userFirstName')->where('username',$username)->get();
            Session::put('firstname', $firstname[0]->userFirstName);
            $lastname = DB::table('Users')->select('userLastName')->where('username',$username)->get();
            Session::put('lastname', $lastname[0]->userLastName);
            $email = DB::table('Users')->select('userEmail')->where('username',$username)->get();
            Session::put('email', $email[0]->userEmail);
            $gender = DB::table('Users')->select('userGender')->where('username',$username)->get();
            Session::put('gender', $gender[0]->userGender);
            $dob = DB::table('Users')->select('userDOB')->where('username', $username)->get();
            Session::put('dob', $dob[0]->userDOB);
            $idCard = DB::table('Users')->select('userIdcard')->where('username', $username)->get();
            Session::put('idCard', $idCard[0]->userIdcard);
            $profileImage = DB::table('Users')->select('userProfileImage')->where('username', $username)->get();
            Session::put('profileImage', $profileImage[0]->userProfileImage);
            $queryGuideid = DB::select("select guideId from Guide where username='".$username."'");
            $queryTouristid = DB::select("select touristId from Tourist where username='".$username."'");

            if(!empty($queryGuideid)){
                $guideid = $queryGuideid[0]->guideId;
                Session::put('guideid', $guideid);
                $guidelocation = DB::select("select guideLocation from Guide where username='".$username."'");
                if(($guidelocation) != null){
                    Session::put('guideLocation', $guidelocation[0]->guideLocation);
                }
                $guideVerification = DB::select("select guideVerification from Guide where username='".$username."'");
                Session::put('guideVerification', $guideVerification[0]->guideVerification);

                $guideBankAccountNumber = DB::select("select bankAccountNumber from GuideBankAccount where guideId=".$guideid);
                $guideBankAccountBank = DB::select("select bankAccountBank from GuideBankAccount where guideId=".$guideid);
                if(($guideBankAccountNumber) != null){
                    Session::put('guideBankAccountNumber', $guideBankAccountNumber[0]->bankAccountNumber);
                    Session::put('guideBankAccountBank', $guideBankAccountBank[0]->bankAccountBank);
                }
                $NotificationCount = DB::select("select count(distinct chatRoomId) as notiCount from ChatRoom where readStatus is null and sender = 'Tourist' and guideId=".$guideid);
                Session::put('NotificationCount', $NotificationCount[0]->notiCount);
                //dd($guideBankAccountNumber);
            }
            if(!empty($queryTouristid)){
                $touristid = $queryTouristid[0]->touristId;
                Session::put('touristid', $touristid);
                $NotificationCount = DB::select("select count(distinct chatRoomId) as notiCount from ChatRoom where readStatus is null and sender = 'Guide' and touristId=".$touristid);
                Session::put('NotificationCount', $NotificationCount[0]->notiCount);
            }
            return redirect('/');

        }
        else{
            echo "<script>window.alert('Dublicate email! Please change.')</script>";
            return redirect('/');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}
