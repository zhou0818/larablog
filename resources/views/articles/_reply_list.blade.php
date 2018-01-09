<div class="list-group">
    @foreach($replies as $index => $reply)
        <div class="list-group-item list-group-item-action flex-column align-items-start" name="reply{{ $reply->id }}"
             id="reply{{ $reply->id }}">
            <div class="media">
                <a href="{{ route('users.show', [$reply->user_id]) }}" class="mr-3">
                    <img class="img-thumbnail" alt="{{ $reply->user->name }}"
                         src="{{ $reply->user->avatar }}" style="max-width:48px;max-height:48px;"/>
                </a>
                <div class="media-body d-inline-flex">
                    <div class="mr-auto">
                        <a class="text-muted" href="{{ route('users.show', [$reply->user_id]) }}"
                           title="{{ $reply->user->name }}">
                            {{ $reply->user->name }}
                        </a>
                        <span> •  </span>
                        <small class="text-muted"
                               title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</small>
                        <div class="mb-1 reply-contents">{!! $reply->contents !!}</div>
                    </div>
                    <div class="d-inline-flex">
                        <a href="#contents" class="p-1" title="回复"
                           onclick="reply_somebody('{{ $reply->user->name }}')">
                            <i class="fas fa-paper-plane"></i>
                        </a>
                        @can('destroy',[$reply,$article])
                            <form action="{{ route('replies.destroy',$reply->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-link btn-xs" role="button" style="cursor:pointer"
                                        title="删除回复">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@section('scripts')
    <script>
        function reply_somebody(name) {
            $('#contents').val($('#contents').val() + '@' + name + ' ');
        }
    </script>
@endsection