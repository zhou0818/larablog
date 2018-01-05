<div class="media">
    <a href="{{ route('users.show', $notification->data['user_id']) }}" class="mr-3">
        <img class="img-thumbnail" alt="{{ $notification->data['user_name'] }}"
             src="{{ $notification->data['user_avatar'] }}" style="max-width:48px;max-height:48px;"/>
    </a>
    <div class="media-body">
        <h6 class="mt-0">
            <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
            评论了
            <a href="{{ $notification->data['article_link'] }}">{{ $notification->data['article_title'] }}</a>
        </h6>
        {!! $notification->data['reply_contents'] !!}
    </div>
</div>
<hr>
