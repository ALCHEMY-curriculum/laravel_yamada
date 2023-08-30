
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
        <x-tweets :tweet="$tweet" />
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
