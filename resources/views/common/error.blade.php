@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4>有错误发生：</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif