<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウントページ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  </head>
  <body>
  <x-layout title="アカウントページ">
  <div class="container">
    <h1>アカウントページ</h1>

    <img src="{{ $iconUrl }}" />
    <p>ID:{{ Auth::id() }}</p>
    <p>USER NAME:{{ Auth::user()->name }}</p>
    <p>E-mail:{{ Auth::user()->email }}</p>
    <form action="{{ route('account.icon') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="input-group mb-3">
        <input type="file" class="form-control" name="icon" required>
        <button class="btn btn-primary" type="submit">アップロード</button>
      </div>
    </form>
  </div>
</x-layout>
  </body>
</html>

