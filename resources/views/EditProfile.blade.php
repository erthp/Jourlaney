@extends('header')
@section('page')
<div class="container">
    <h3 class="text-center register-header">Edit Profile</h3>
        <form method="POST" id="register-form" name="register-form" action="{{URL::to('/editprofile')}}" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-lg-2">
                    <label class="register-label" for="username">Username</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 20]" value="{{Session::get('username')}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="firstname">First name</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <input type="text" class="form-control" name="firstname" placeholder="First name" data-parsley-required="true" data-parsley-type="alphanum" value="{{Session::get('firstname')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="lastname">Last name</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastname" placeholder="Last name" data-parsley-required="true" data-parsley-type="alphanum"  value="{{Session::get('lastname')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="email">Email</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" data-parsley-required="true" data-parsley-type="email"  value="{{Session::get('email')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="gender">Gender</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" required>
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
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="birthdate">Birthdate</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                    <input type="date" class="form-control" name="birthdate" placeholder="Birthday" validateDate value="{{Session::get('dob')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="idcard">ID card number</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <input type="text" class="form-control" id="idcard "name="idcard" placeholder="ID card number" data-parsley-type="integer" data-parsley-required="true" data-parsley-length="[13, 13]" value="{{Session::get('idCard')}}">
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-10">
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