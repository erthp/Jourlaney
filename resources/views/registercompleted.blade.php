@extends('header')
@section('page')
<div class="container">
    <h3 class="text-center register-header">Register Completed.</h3>
        

    </div>
<script>
    $('#register-form').parsley();
    $(document).ready(function(){
        $('#idcard').mask('0-0000-00000-0');
        $('.guidelicense').mask('00-00000');
    });
</script>
@endsection