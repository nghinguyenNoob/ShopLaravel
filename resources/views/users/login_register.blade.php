@extends('frontEnd.layouts.master')
@section('title','Login Register Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <br>
        <h2 style="display:flex;justify-content: center;">Đăng nhập</h2>
        <div class="row" style="display:flex;justify-content: center;">
        
            
            
                <div style="border:1px solid orange ;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0.20, 0, 0.19); border-radius: 15px;padding:50px;width:500px; display:flex;justify-content: center; " class="login-form" ><!--login form-->
                
                    
                    <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="male">Email</label>
                        <input style="width: 300px; " type="email" placeholder="Email" name="email"/>
                        <label for="male">Password</label>
                        <input style="width: 300px; " type="password" placeholder="Password" name="password"/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button style="display:flex;justify-content: center;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0.20, 0, 0.19);" type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            
            
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection