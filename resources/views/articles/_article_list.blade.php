@if(count($articles))
    @foreach($articles as $article)
        <div class="card mb-3">
            <a href="{{ route('articles.show',$article->id) }}">
                <img class="card-img-top article-img" src="{{ $article->image }}"
                     alt="{{ $article->title }}"
                     title="{{ $article->title }}">
            </a>
            <div class="card-body">
                <a class="text-muted" href="{{ route('articles.show',$article->id) }}">
                    <h4 class="card-title">{{ $article->title }}</h4>
                </a>
                <a class="text-muted" href="{{ route('articles.show',$article->id) }}">
                    <p class="card-text mb-2">{{ $article->excerpt }}</p>
                </a>
                <p class="card-text">
                    <a class="text-muted mr-3" href="{{ route('categories.show',$article->category->id) }}"
                       title="{{ $article->category->name }}">
                        <i class="far fa-flag"></i>
                        <small>{{ $article->category->name }}</small>
                    </a>
                    <a class="text-muted mr-3" href="{{ route('users.show',$article->user_id) }}"
                       title="{{ $article->user->name }}">
                        <i class="far fa-user"></i>
                        <small>{{ $article->user->name }}</small>
                    </a>
                    <i class="far fa-clock text-muted"></i>
                    <small class="text-muted mr-3" title="最后活跃于">{{ $article->updated_at->diffForHumans() }}</small>
                </p>
            </div>
        </div>
    @endforeach
@else
    <div>暂无数据 ~_~</div>
@endif