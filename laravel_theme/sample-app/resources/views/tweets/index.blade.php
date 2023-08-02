<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ついったー</title>
  </head>
  <body>
    <h1>つぶやき一覧</h1>

    <div class="tweets">
      @foreach($tweets as $tweet)
        <div class="tweet">
          <p>{{ $tweet->content }}</p>
          <p>{{ $tweet->created_at}}</p>
        </div>
      @endforeach
    </div>
  </body>
</html>