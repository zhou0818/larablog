@extends('layouts.app')
@section('title',$article->title)
@section('description',$article->excerpt)
@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">
                        {{ $article->title }}
                    </h1>
                    <div class="article-meta text-center">
                        {{ $article->created_at->diffForHumans() }}
                        ⋅
                        <i class="fas fa-reply-all"></i>
                        {{ $article->reply_count }}
                    </div>

                    <div class="article-body">
                        {!! $article->body !!}
                    </div>
                    @can('update',$article)
                        <hr>
                        <div class="d-inline-flex">
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default btn-xs"
                               role="button">
                                <i class="fas fa-edit"></i> 编辑
                            </a>
                            <form action="{{ route('articles.destroy',$article->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" style="cursor:pointer;text-decoration: none"
                                        class="btn btn-link btn-xs" role="button">
                                    <i class="fas fa-trash-alt"></i> 删除
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
            {{-- 用户回复列表 --}}
            @include('articles._reply_list', ['replies' => $article->replies()->with('user')->get(),'article'=>$article])
            @includeWhen(Auth::check(), 'articles._reply_box', ['article' => $article])
        </div>
        <div class="col-lg-3 col-md-3 author-info">
            <div class="card text-center">
                <span class="badge badge-primary" style="width: 50px;border-radius: 0">作者</span>
                <a href="{{ route('users.show', $article->user->id) }}">
                    <img class="rounded-circle img-thumbnail mt-3"
                         src="{{ $article->user->avatar }}"
                         alt="{{ $article->user->name }}">
                </a>
                <div class="card-body">
                    <a href="{{ route('users.show', $article->user->id) }}">
                        <h5 class="card-title text-muted"> {{ $article->user->name }}</h5>
                        @if(!$article->user->introduction)
                            <h6 class="card-title text-muted">这家伙很懒，什么都没有写</h6>
                        @else
                            <h6 class="card-title text-muted">{{$article->user->introduction}} </h6>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop