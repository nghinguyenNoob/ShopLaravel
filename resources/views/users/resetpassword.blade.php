@extends('frontEnd.layouts.master')
@section('title','My Account Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <h2 style="display:flex;justify-content: center;">Thông tin tài khoản</h2>
        <div class="row" style="display:flex;justify-content: center;">
        
            
            
                <div style="border:1px solid black ;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0.20, 0, 0.19); border-radius: 15px;padding:50px;width:500px; display:flex;justify-content: center; " class="login-form" ><!--login form-->
                <div class="signup-form"><!--sign up form-->
                    <form action="{{url('/update-password',$user_login->id)}}" method="post" class="form-horizontal">
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                        <div class="form-group {{$errors->has('password')?'has-error':''}}">
                            <label for="male">Mật khẩu cũ</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Old Password">
                            @if(Session::has('oldpassword'))
                                <span class="text-danger">{{Session::get('oldpassword')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('newPassword')?'has-error':''}}">
                            <label for="male">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
                            <span class="text-danger">{{$errors->first('newPassword')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('newPassword_confirmation')?'has-error':''}}">
                            <label for="male"> Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" name="newPassword_confirmation" id="newPassword_confirmation" placeholder="Confirm Password">
                            <span class="text-danger">{{$errors->first('newPassword_confirmation')}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right;">Update Password</button>
                    </form>
                </div><!--/sign up form-->
            </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection