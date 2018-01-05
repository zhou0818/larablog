@extends('layouts.app')
@section('title',isset($category) ? $category->name :'文章列表')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9">
            @if (isset($category))
                <div class="alert alert-info" role="alert">
                    {{ $category->name }} ：{{ $category->description }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(!if_query('order','recent_replies')) }}"
                               href="{{ Request::url() }}?order=default">最新发布</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(if_query('order','recent_replies')) }}"
                               href="{{ Request::url() }}?order=recent_replies">最后回复</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @include('articles._article_list')
                    {!! $articles->links() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            @includeWhen(Auth::check(), 'articles._sidebar')
        </div>
    </div>
@stop
