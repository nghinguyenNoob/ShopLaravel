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
        <h2 style="display:flex;justify-content: center;">Đăng ký tài khoản</h2>
        <div class="row" style="display:flex;justify-content: center;">
        
            
            
                <div style="border:1px solid orange ;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0.20, 0, 0.19); border-radius: 15px;padding:50px;width:500px; display:flex;justify-content: center; " class="login-form" ><!--login form-->
                <div class="signup-form"><!--sign up form-->
                    
                    <form action="{{url('/register_user')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <input style="width: 300px;" type="text" placeholder="Name" name="name" value="{{old('name')}}"/>
                        <span class="text-danger">{{$errors->first('name')}}</span>

                        <input style="width: 300px;" type="email" placeholder="Email Address" name="email" value="{{old('email')}}"/>
                        <span class="text-danger">{{$errors->first('email')}}</span>

                        <input style="width: 300px;" type="password" placeholder="Password" name="password" value="{{old('password')}}"/>
                        <span class="text-danger">{{$errors->first('password')}}</span>

                        <input style="width: 300px;" type="password" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>

                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection