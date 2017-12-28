@if (count($articles))
    <div class="list-group">
        @foreach($articles as $article)
            <a href="{{ route('articles.show',$article->id) }}"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <h5 class="mb-1">{{ $article->title }}</h5>
                <small> {{ $article->reply_count }} 回复<span> ⋅ </span>{{ $article->created_at->diffForHumans() }}
                </small>
            </a>
        @endforeach
    </div>
@else
    <div>暂无数据 ~_~</div>
@endif

{{-- 分页 --}}
{!! $articles->links() !!}