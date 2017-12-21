@extends('layouts.app')
@section('title', $user->name . ' 的个人中心')
@section('content')
    <div class="row">

        <div class="col-lg-3 col-md-3 d-none d-sm-block user-info">
            <div class="card">
                <img class="card-img-top"
                     src="{{$user->avatar}}"
                     alt={{$user->name}} ."的头像">
                <div class="card-body">
                    <hr>
                    <h4><strong>个人简介</strong></h4>
                    @if(!$user->introduction)
                        <p>这家伙很懒，什么都没有写</p>
                    @else
                        <p>{{$user->introduction}} </p>
                    @endif
                    <hr>
                    <h4><strong>注册于</strong></h4>
                    <p>{{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <span>
                         <h1 class="panel-title pull-left" style="font-size:30px;">{{ $user->name }}
                             <small>{{ $user->email }}</small></h1>
                    </span>
                </div>
            </div>
            <hr>

            {{-- 用户发布的内容 --}}
            <div class="card">
                <div class="card-body">
                    暂无数据 ~_~
                </div>
            </div>
        </div>
    </div>
@stop