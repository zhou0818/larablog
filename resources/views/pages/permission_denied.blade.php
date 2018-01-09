@extends('layouts.app')
@section('title', '无权限访问')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <div class="card-body">
                    @if (Auth::check())
                        <div class="alert alert-danger text-center">
                            当前登录账号无后台访问权限。
                        </div>
                    @else
                        <div class="alert alert-danger text-center">
                            请登录以后再操作
                        </div>

                        <a class="btn btn-lg btn-primary btn-block" href="{{ route('login') }}">
                            <span class="fas fa-sign-in-alt" aria-hidden="true"></span>
                            登 录
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop