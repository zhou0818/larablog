<div class="reply-box">
    <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="form-group">
            <textarea class="form-control {{ $errors->has('contents') ? ' is-invalid' : '' }}" rows="3"
                      placeholder="分享你的想法"
                      name="contents" id="contents"></textarea>
            @if($errors->has('contents'))
                {!! validate_error($errors->get('contents')) !!}
            @endif
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-reply mr-1"></i>回复</button>
        </div>
    </form>
</div>

