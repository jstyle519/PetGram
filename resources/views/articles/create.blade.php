@extends('app')

@section('title', '記事投稿')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            {{-- <form class="upload-images p-0 border-0" id="new_article" enctype="multipart/form-data" action="{{ route('articles.store') }}" accept-charset="UTF-8" method="POST">
            @include('error_card_list') --}}
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}">
                <div class="mb-3">
                @include('articles.form')
                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
              </form>
            </div>
          </div>
          {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
@endsection