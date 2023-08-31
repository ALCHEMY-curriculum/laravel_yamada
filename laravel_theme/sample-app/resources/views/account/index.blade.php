
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
 

