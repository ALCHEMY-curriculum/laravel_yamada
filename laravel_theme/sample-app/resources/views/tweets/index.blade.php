<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ついったー</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  </head>
  <body>
    <x-layout> 
    <div class="container ">
  
      <h1>つぶやき一覧</h1>
      <form action="{{ route('tweets.create') }}" method="post">
  @csrf
  <div class="mb-3">
    <textarea
      name="tweet"
      class="form-control @error('tweet') is-invalid @enderror"
      rows="3"
      placeholder="いまどうしてる？"
    ></textarea>

    @error('tweet')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="submit" class="btn btn-primary">ツイートする</button>
  </div>
 
</form>
<x-tweets :tweets="$tweets">
      <div class="tweets">
        @foreach($tweets as $tweet)

        <div class="tweet">
  <p>{{ $tweet->user->name }} {{ $tweet->created_at }}</p>
  <p>{{ $tweet->content }}</p>
  <a href="{{ route('tweets.show', ['id' => $tweet->id]) }}">詳細ページを見る</a>
  @if( Auth::id() === $tweet->user_id)
  <p><button type="submit" class="btn btn-primary"><a href="{{ route('tweets.update.index', ['id' => $tweet->id]) }}"class="text-decoration-none text-light">編集</a></button></p>

  <form action="{{ route('tweets.delete', ['id' => $tweet->id]) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-danger">削除</button>
  </form>
  @endif
</div>

       

        @endforeach
       
      </div>
      </x-tweets>
    </div>
    </x-layout>
  </body>
</html>

