@extends('header')
@section('page')
<div class="container homemenu">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <a href = "recommend"><img src="../icon/medal.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Recommend</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "createtrip"><img src="../icon/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "findguide"><img src="../icon/glasses.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Find Guide</p>
                    </div>
                </div>
            </div>
        </div>
<br>
<div class="container">
    <h3 class="text-center trip-header">Create your trip</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/createtrip')}}">
            <div class="row mt-5">
                <div class="col-lg-2">
                    <label class="trip-label" for="tripname">Trip name</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tripname" id="tripname" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 50]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="location">Location</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="location" id="location" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="date">Date</label>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="date" id="date" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
                <lable>-</lable>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="date" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                <label class="trip-label" for="trippic">Trip picture</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <a class='btn btn-primary' href='javascript:;'>
                            Choose File...
                            <input type="file" name="file_source" id="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label">Trip details :</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="transportation">Transportation</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <select class="form-control" id="transportation "name="transportation"  data-parsley-type="integer" data-parsley-required="true">
                            <option value="private car">Private car</option>
                            <option value="private van">Private van</option>
                            <option value="public transportation">Public transportation</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="max-traveller" >Max traveller</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="number" class="form-control" name="max-traveller" id="max-traveller"  data-parsley-required="true">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="language">Language</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <select class="form-control" id="language" name="language"  data-parsley-type="integer" data-parsley-required="true">
                            <option value="english">English</option>
                            <option value="thai">Thai</option>
                            <option value="chinese">Chianese</option>
                            <option value="japanese">Japanese</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="trip-conditions">Trip conditions</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" class="form-control" name="trip-conditions" id="trip-conditions" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label>Itinerary</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <textarea cols="20" rows="10" class="form-control" name="trip-details" id="trip-details" data-parsley-required="true" data-parsley-type="alphanum">
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
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