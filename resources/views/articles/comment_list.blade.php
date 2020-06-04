{{-- コメント機能を表示させる --}}
@foreach ($article->comments as $comment) 
  <div class="mb-2">
      <a class="delete-comment"  data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}"></a>
    <span>
      <strong>
        <a class="no-text-decoration black-color" href="{{ route('users.show', ['name' => $article->user->name]) }}">
          {{ $comment->user->name }}</a>
      </strong>
    </span>
    <span>{{ $comment->comment }}</span>
  </div>
@endforeach
