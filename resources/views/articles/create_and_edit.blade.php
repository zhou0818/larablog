@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h4><i class="fas fa-edit"
                                            style="margin-right: 8px"></i>{{ $article->id?'编辑文章':'新建文章' }}</h4></div>
            <div class="card-body">
                <form action="{{ $article->id?route('articles.update',$article->id):route('articles.store') }}"
                      method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                    @if($article->id)
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" type="text"
                               name="title" value="{{ old('title', $article->title ) }}" placeholder="请填写标题"/>
                        @if($errors->has('title'))
                            {!! validate_error($errors->get('title')) !!}
                        @endif
                    </div>
                    <div class="form-group">
                        <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                name="category_id" title="请选择分类">
                            <option value="" hidden
                                    disabled {{ $article->id||old('category_id',$article->category_id) ? '' : 'selected' }}>
                                请选择分类
                            </option>
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}" {{ old('category_id',$article->category_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            {!! validate_error($errors->get('category_id')) !!}
                        @endif
                    </div>
                    <div class="form-group">
                         <textarea name="body"
                                   class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}"
                                   id="editor" rows="3"
                                   placeholder="请填入至少三个字符的内容。">{{ old('body', $article->body ) }}</textarea>
                        @if($errors->has('body'))
                            @foreach($errors->get('body') as $error)
                                <div class="invalid-feedback" style="display: block">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image_field">封面图</label>
                        <br/>
                        <label class="custom-file">
                            <input type="file" id="image_field" name="image"
                                   value="{{ old('image', $article->image ) }}"
                                   class="custom-file-input{{ $errors->has('image') ? ' form-control is-invalid' : '' }}"
                                   onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                            <span class="custom-file-control"></span>
                            @if($errors->has('image'))
                                {!! validate_error($errors->get('image')) !!}
                            @endif
                        </label>
                        @if($article->image)
                            <br/>
                            <img class="img-thumbnail" src="{{ $article->image }}" width="200"/>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

    <script>
        $(document).ready(function () {
            const editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('articles.upload_image') }}',
                    params: {_token: '{{ csrf_token() }}'},
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
            });
        });
    </script>

@stop