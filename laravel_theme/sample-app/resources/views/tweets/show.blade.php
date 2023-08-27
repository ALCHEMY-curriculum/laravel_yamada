<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ついったー</title>
  </head>
  <body>
  <div class="container">
      <h1>つぶやき詳細ページ #{{ $tweet->id }}</h1>
      <p>
      <button type="submit" class="btn btn-primary"><a href="{{ route('tweets.index') }}"class="text-light text-decoration-none">つぶやき一覧へ戻る</a></button>
      </p>
      
        <div class="mb-3">
          <p>ツイート内容</p>
          <p>{{ $tweet->content }}</p>

        </div>

        @if( Auth::id() === $tweet->user_id)

          <button type="submit" class="btn btn-primary mb-1"><a href="{{ route('tweets.update.index', ['id' => $tweet->id]) }}" class="text-light text-decoration-none">編集</a></button>
        <form action="{{ route('tweets.delete', ['id' => $tweet->id]) }}" method="post">
  @method('delete')
  @csrf
  <button type="submit" class="btn btn-danger">削除</button>
</form>

@endif
      </div>

    </div>
  </body>
</html>
