@extends('header')
@section('page')
        <div class="container homemenu">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <a href = "newfeeds"><img src="../pic/medal.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Recommend</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "guidecreatetrip"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
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
@endsection
