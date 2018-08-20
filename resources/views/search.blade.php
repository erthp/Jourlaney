@extends('headerNav')
@section('page')
<div class="container">
    <div class="row searchpage-margin">
        <div class="col-12">
            <h4>Search</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <form method="GET" action="{{URL::to('/search')}}">
                <input type="text" class="searchbox-searchpage animated fadeIn" name="search" placeholder="Search trip">
        </div>
        <div class="col-4">
                <button type="submit" class="btn btn-success btn-block searchpage-submitbutton">Submit</button>
        </div>
            </form>
    </div>
</div>
@endsection