@extends('headerNav')
@section('page')
<div class="container">
    <div class="row resetPasswordLabel">
        <div class="col-2">
        </div>
        <div class="col-8">
            <div class="center"><h3>Reset Password</h3></div>
        </div>
        <div class="col-2">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <form method="POST" name="register-form" action="{{ URL::to('/resetpassword') }}">      
                {{ csrf_field() }}                  
                <div class="container">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="login-label animated fadeIn" for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="login-label animated fadeIn" for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <a href="resetpassword"><label class="login-label" for="forgetPassword" id="forgetPassword">Forget password?</label></a>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary login-button">Log in</button>
                        <button type="button" class="btn btn-default login-button" data-dismiss="modal">Close</button>
                    </div>
                </form>
                </div>
        <div class="col-2">
        </div>
</div>
@endsection