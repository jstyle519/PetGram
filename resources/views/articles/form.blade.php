{{-- 記事投稿画面 --}}
@csrf
  {{-- タイトル --}}
  <div class="md-form">
    <label>☆タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
  </div>
  {{-- タグ --}}
  <div class="form-group mt-2">
    <article-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
    >
    </article-tags-input>
  </div>
  {{-- 本文 --}}
  <div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="16" placeholder="☆本文">{{ $article->body ?? old('body') }}</textarea>

  {{-- 画像   --}}
    <div class="form-group row">
      <div class="col-md-10 mt-2">
        <label>☆自慢のペットの写真を添付してください。</label><br>
        <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" method="POST">
        <input type="file" name="image" accept="image/jpeg,image/gif,image/png" />
      </div>
    </div>
    {{-- アラートさせる --}}
    <script type="text/javascript">
      $('#article_image').bind('change', function() {
        var size_in_megabytes = this.files[0].size/1024/1024;
        if (size_in_megabytes > 1) {
          alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
        }});
    </script>
</div>