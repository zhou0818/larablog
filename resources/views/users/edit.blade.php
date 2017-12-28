@extends('layouts.app')
@section('title', '编辑个人资料')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h4><i class="fas fa-edit"></i> 编辑个人资料</h4></div>
            <div class="card-body">
                <form action="{{route('users.update',$user->id)}}" method="post" accept-charset="UTF-8"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name-field">用户名</label>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                               name="name" id="name-field"
                               value="{{ old('name', $user->name ) }}"/>
                        @if($errors->has('name'))
                            {!! validate_error($errors->get('name')) !!}
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email-field">邮 箱</label>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text"
                               name="email" id="email-field"
                               value="{{ old('email', $user->email ) }}"/>
                        @if($errors->has('email'))
                            {!! validate_error($errors->get('email')) !!}
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="introduction-field">个人简介</label>
                        <textarea name="introduction" id="introduction-field"
                                  class="form-control{{ $errors->has('introduction') ? ' is-invalid' : '' }}"
                                  rows="3">{{ old('introduction', $user->introduction ) }}</textarea>
                        @if($errors->has('introduction'))
                            {!! validate_error($errors->get('introduction')) !!}
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="avatar_field">用户头像</label>
                        <br/>
                        <label class="custom-file">
                            <input type="file" id="avatar_field" name="avatar"
                                   class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}"
                                   onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                            <span class="custom-file-control"></span>
                            @if($errors->has('avatar'))
                                {!! validate_error($errors->get('avatar')) !!}
                            @endif
                        </label>
                        @if($user->avatar)
                            <br/>
                            <img class="img-thumbnail" src="{{ $user->avatar }}" width="200"/>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">保存</button>
                </form>
            </div>
        </div>
    </div>
@stop