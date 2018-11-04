@extends('headerNav')
@section('page')
<div class="container navGap">
    <h3 class="register-header">Report to Admin</h3>
        <form method="POST" name="register-form" action="{{URL::to('/reportToAdmin')}}" enctype="multipart/form-data">
            <input type="hidden" name="chatRoomId" value="{{ $query[0] -> chatRoomId}}">
            <div class="row">
                <div class="col-8">
                    <h5 class="profileedit-menu">Your Trip Info</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="register-label">Trip: </label> {{ $query[0] -> tripName}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="register-label">On: </label> {{ $query[0] -> tripStartDate}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="register-label">With: </label> {{ $query[0] -> userFirstName}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <h5 class="profileedit-menu">Problem</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="problem" id="Cheat" value="Cheat">
                        <label class="form-check-label">
                            Cheat.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="problem" id="noplan" value="Doesn't go on plan">
                        <label class="form-check-label">
                            Doesn't go on plan.
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="register-label">Other</label>
                        <textarea class="form-control" name="other" id="other" rows="5"></textarea>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <div class="row text-center mb-4">
                <div class="col-8">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
        </form>
</div>
@endsection