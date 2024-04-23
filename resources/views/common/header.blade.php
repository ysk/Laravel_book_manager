<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h1>TECH CACHE</h1>
            <p class="navbar-subtitle" style="font-size: 12px;">みんなの技術書の本棚共有サイト</p>

        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <form action="{{ route('search.result') }}" method="GET" class="d-flex" placeholder="検索キーワード">
                    <div class="input-group mr-2">
                        <select name="category_id" class="form-select">
                            <option value="">全てのカテゴリ</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="検索">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </form>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn btn-link text-white" href="{{ route('login') }}">ログイン</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-link text-white" href="{{ route('register') }}">新規登録</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="btn btn-link text-white" href="{{ route('profile.show', [ 'id' => Auth::user()->id ]) }}">{{ Auth::user()->name }} マイページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>

.navbar-subtitle {
    font-size: 10px;
}

</style>