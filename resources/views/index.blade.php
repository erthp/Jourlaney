@extends('header')
@section('page')
        <div class="container homemenu">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <a href = "/"><img src="../pic/medal.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Recommend</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                    @if(!empty(Session::get('guideid')))
                        <a href = "guidecreatetrip"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @elseif(!empty(Session::get('touristid')))
                        <a href = "touristcreatetrip"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @else
                        <a href = "/"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    @endif
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "findguide"><img src="../pic/glasses.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Find Guide</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <dic class="row">
        <div class ="col-4 text-center">
            <img src="../images/chiangmai.jpg" class="img-responsive" hight="300px" width="300px">
            <br>
            <p class="h4">chiangmai </p>
        </div>
        <div class ="col-4 text-center">
            <img src="../images/chiangmai.jpg" class="img-responsive" hight="300px" width="300px">
            <br>
            <p class="h4">chiangmai </p>
        </div>
        <div class ="col-4 text-center">
            <img src="../images/chiangmai.jpg" class="img-responsive" hight="300px" width="300px">
            <br>
            <p class="h4">chiangmai </p>
        </div>
        </div>
@endsection
