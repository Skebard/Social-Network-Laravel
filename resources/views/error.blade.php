@extends('layouts.master_home')
@section('links')
<style>
    main{
        display:flex;
        align-items: center;
        justify-content: center;
    }
    .error{
        font-size:80px;
        font-weight:bolder;
        color:grey;
    }
    @media screen and (max-width:550px){
        .error{
            font-size:40px;
        }
    }
</style>
@endsection

@section('content')
<h1 class='error'>ERROR 404</h1>
@endsection
@section('modals')
@include('components.modalCreatePost')
@endsection