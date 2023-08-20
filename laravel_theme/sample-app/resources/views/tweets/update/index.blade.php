<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ついったー</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <x-layout>
    <div class="container">
      <h1>つぶやき編集 #{{ $tweet->id }}</h1>
      <p>
        <a href="{{ route('tweets.index') }}">つぶやき一覧へ戻る</a>
      </p>
      <form action="{{ route('tweets.update.put', ['id' => $tweet->id]) }}" method="post">
        @method('put')
        @csrf
        
        <div class="mb-3">
          <textarea
            name="tweet"
            class="form-control @error('tweet') is-invalid @enderror"
            rows="3"
            placeholder="いまどうしてる？"
          >{{ $tweet->content }}</textarea>

          @error('tweet')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-primary">編集</button>
        </div>
      </form>
      @if (session('feedback.success'))
  <div class="alert alert-success" role="alert">
    {{ session('feedback.success') }}
  </div>
@endif
    </div>
    </x-layout>
  </body>
</html>
