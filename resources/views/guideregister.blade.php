@extends('header')
@section('page')
<div class="container">
<div class="col-12 register-bg">
                <h3 class="text-center register-header">Sign up to guide</h3>

                <form method="POST" name="register-form">
                <div class="form-group">
                    <label class="register-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="register-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="register-label" for="password">Re-password</label>
                    <input type="repassword" class="form-control" id="repassword" placeholder="Re-password">
                </div>
                <div class="form-group">
                    <label class="register-label" for="password">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label class="register-label" for="password">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" placeholder="Birthday">
                </div>
                <div class="form-group">
                    <label class="register-label" for="password">ID card number</label>
                    <input type="number" class="form-control" id="idcard" placeholder="ID card number">
                </div>
                <div class="form-group">
                    <label class="register-label" for="guidelicense">Guide license number</label>
                    <input type="number" class="form-control" id="guidelicense" placeholder="Guide license number">
                </div>
                <div class="form-group">
                    <label class="register-label" for="guidelicensepic">Guide license card picture</label>
                    <a class='btn btn-primary' href='javascript:;'>
                        Choose File...
                        <input type="file" name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
</div>
@endsection