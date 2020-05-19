@foreach ($article->comments as $comment) 
  <div class="mb-2">
    @if ($comment->user->id == Auth::user()->id)
      <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}"></a>
    @endif
    <span>
      <strong>
        <a class="no-text-decoration black-color" href="{{ route('users.show', ['name' => $article->user->name]) }}">
          {{ $comment->user->name }}</a>
      </strong>
    </span>
    <span>{{ $comment->comment }}</span>
  </div>
@endforeach

<style>
  .delete-comment {
  background-image: url("/images/parts8.png");
  background-repeat: no-repeat;
  width: 11px;
  height: 11px;
  float: right;
  margin: 5px 0 0 10px;
  background-size: 11px !important;
}
</style>