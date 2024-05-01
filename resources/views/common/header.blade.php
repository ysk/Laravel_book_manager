<header class="header">
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h1>Tech Cache</h1>
                <p class="navbar-subtitle" style="font-size: 12px;">みんなの技術書の本棚共有サイト</p>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item nav-about">
                        <a class="nav-link" href="{{ route('pages.about') }}">Tech Cacheについて</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item nav-search">
                        <form action="{{ route('search.result') }}" method="GET" class="d-flex">
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
                                <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i>検索</button>
                            </div>
                        </form>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item nav-login">
                                <a class="btn btn-link text-white" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i>ログイン</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item nav-register register-btn">
                                <a class="btn btn-primary btn-register" href="{{ route('register') }}"><i class="fa-solid fa-square-arrow-up-right"></i>新規登録</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="thumbnail me-2">
                                        @if(isset($user->userprof->prof_thumbnail))
                                            <img src="{{ asset('storage/uploads/' . $user->userprof->prof_thumbnail) }}" alt="{{ $user->name }}" class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div>{{ Auth::user()->name }}</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.show', [ 'id' => Auth::user()->id ]) }}"><i class="fa-regular fa-user"></i>マイページ</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('books.create') }}"><i class="fa-regular fa-pen-to-square"></i>本を登録する</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i>ログアウト</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
