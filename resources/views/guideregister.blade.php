@extends('header')
@section('page')
<div class="container">
<div class="col-12 register-bg">
                <h3 class="text-center register-header">Sign up to guide</h3>

                <form method="POST" name="register-form" action="{{URL::to('/guideregis')}}">
                <div class="form-group">
                    <label class="register-label" for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="register-label" for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="register-label" for="repassword">Re-password</label>
                    <input type="password" class="form-control" name="repassword" placeholder="Re-password">
                </div>
                <div class="form-group">
                    <label class="register-label" for="firstname">First name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="First name">
                </div>
                <div class="form-group">
                    <label class="register-label" for="lastname">Last name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last name">
                </div>
                <div class="form-group">
                    <label class="register-label" for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <label class="register-label" for="gender">Gender</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Undefined">
                        <label class="form-check-label" for="undefined">Undefined</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="register-label" for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" name="birthdate" placeholder="Birthday">
                </div>
                <div class="form-group">
                    <label class="register-label" for="idcard">ID card number</label>
                    <input type="number" class="form-control" name="idcard" placeholder="ID card number">
                </div>
                <div class="form-group">
                    <label class="register-label" for="guidelicense">Guide license number</label>
                    <input type="number" class="form-control" name="guidelicense" placeholder="Guide license number">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                    <label class="register-label" for="guidelicensepic">Guide license card picture</label>
                    <a class='btn btn-primary' href='javascript:;'>
                        Choose File...
                        <input type="file" name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
</div>
@endsection