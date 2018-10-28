@extends('headerNav')
@section('page')
<div class="container navGap">
    <h3 class="register-header">Edit Profile</h3>
        <form method="POST" name="register-form" action="{{URL::to('/editprofile')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <h5 class="profileedit-menu">Personal Info</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="register-label" for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 20]" value="{{Session::get('username')}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="firstname">First name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First name" data-parsley-required="true" data-parsley-type="alphanum" value="{{Session::get('firstname')}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="lastname">Last name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last name" data-parsley-required="true" data-parsley-type="alphanum"  value="{{Session::get('lastname')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" data-parsley-required="true" data-parsley-type="email"  value="{{Session::get('email')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1">
                    <label class="register-label" for="gender">Gender</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            @php
                            $gender = Session::get('gender');
                            @endphp
                            @if($gender == "Male")
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" checked>
                            @else
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                            @endif
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            @if($gender == "Female")
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" checked>
                            @else
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                            @endif
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            @if($gender == "Undefined")
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Undefined" checked>
                            @else
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Undefined">
                            @endif
                            <label class="form-check-label" for="undefined">Undefined</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="birthdate">Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" placeholder="Birthday" validateDate value="{{Session::get('dob')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="idcard">ID card number</label>
                        <input type="text" class="form-control" id="idcard "name="idcard" placeholder="ID card number" data-parsley-type="integer" data-parsley-required="true" data-parsley-length="[13, 13]" value="{{Session::get('idCard')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="profilepic">Profile Picture</label>
                        <img src="../images/profilepic/{{Session::get('profileImage')}}" class="profileImageEdit">
                        <div class="upload-button">
                            <button type="button" class="btn btn-primary">Upload picture</button>
                            <input type="file" class="form-control" id="profilepic" name="profilepic">
                        </div>
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <h5 class="profileedit-menu">Bank Account</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="bankAccount">Bank account number</label>
                        <input type="text" class="form-control" id="bankAccount" name="bankAccount" placeholder="Bank account number" data-parsley-type="integer" data-parsley-required="true" data-parsley-length="[10, 10]" value="{{Session::get('guideBankAccountNumber')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="register-label" for="bankName">Bank name</label>
                        <select class="form-control" id="bankName">
                            <option>Bangkok Bank</option>
                            <option>KASIKORNBANK</option>
                            <option>Krungthai Bank</option>
                            <option>Siam Commercial Bank</option>
                            <option>TMB Bank</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center mb-4">
                <div class="col-8">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
        </form>

    </div>
<script>
    $('#register-form').parsley();
    $(document).ready(function(){
        $('#idcard').mask('0-0000-00000-0');
        $('.guidelicense').mask('00-00000');
    });
</script>
@endsection