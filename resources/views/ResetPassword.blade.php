@extends('headerNav')
@section('page')
@if(!empty(Session::get('username')))
<div class="container">
    <div class="row navGap">
        <div class="col-2">
            
        </div>
        <div class="col-8">
            <a href="javascript:history.back()"><i class="fas fa-angle-left fa-2x mr-3"></i></a><h3 style="display:inline">Reset Password</h3>
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
                            <label class="login-label animated fadeIn" for="password">Old Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="login-label animated fadeIn" for="newpassword">New Password</label>
                            <input type="password" class="form-control" name="newpassword" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label class="login-label animated fadeIn" for="renewpassword">Re-enter New Password</label>
                            <input type="password" class="form-control" name="renewpassword" placeholder="Re-enter New Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Change Password</button>
                </div>
            </form>
        </div>
        <div class="col-2">
        </div>
</div>
@else
<div class="container">
    <div class="row resetPasswordLabel">
        <div class="col-2">
            
        </div>
        <div class="col-8">
            <a href="javascript:history.back()"><i class="fas fa-angle-left fa-2x mr-3"></i></a><h3 style="display:inline">Back</h3>
        </div>
        <div class="col-2">
        </div>
    </div>
@endif
@endsection