@if (count($replies))
    <div class="list-group">
        @foreach($replies as $reply)
            <a href="{{ $reply->article->link(['#reply'.$reply->id]) }}"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <h5 class="mb-1">{{ $reply->article->title }}</h5>
                <p class="mb-1"> {!! $reply->contents !!}</p>
                <small><i class="far fa-clock"></i>回复于：{{ $reply->created_at->diffForHumans() }}
                </small>
            </a>
        @endforeach
    </div>
@else
    <div>暂无数据 ~_~</div>
@endif

{{-- 分页,继承除了page之外的参数 --}}
{!! $replies->appends(Request::except('page'))->links() !!}