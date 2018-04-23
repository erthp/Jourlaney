@extends('header')
@section('page')
<div class="container">
    <h3 class="text-center register-header">Register Completed.</h3>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <form method="POST" name="register-form" action="{{URL::to('/login')}">
                <div class="form-group">
                    <label class="login-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="login-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success btn-block">Log in</button>
            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection