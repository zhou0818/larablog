@extends('layouts.app')
@section('title', '用户注册')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">用户注册</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{route('register')}}">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">用户名</label>

                                <div class="col-lg-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                <div class="col-lg-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">密码</label>

                                <div class="col-lg-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password"
                                           required>
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">重复密码</label>
                                <div class="col-lg-6">
                                    <input id="password-confirm" type="password"
                                           class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                           name="password_confirmation"
                                           required>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="captcha" class="col-lg-4 col-form-label text-lg-right">验证码</label>

                                <div class="col-md-6">
                                    <input id="captcha"
                                           class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                                           name="captcha">

                                    <img class="img-thumbnail captcha" src="{{ captcha_src('flat') }}"
                                         onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                                    @if ($errors->has('captcha'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        注册
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
