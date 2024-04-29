@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-user"></i>{{ $user->name }}さんのマイページ</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    <!-- コンテンツ -->
                    <section class="user_info">
                        <h4>ユーザー情報</h4>
                        <table class="table">
                            <tr>
                                <th></th>
                                <td>
                                    <div class="thumbnail">
                                        @if(isset($user->userprof->prof_thumbnail))
                                            <img src="{{ asset('storage/uploads/' . $user->userprof->prof_thumbnail) }}" alt="{{ $user->name }}" class="img-thumbnail" style="width: 150px">
                                        @else
                                            <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>住所</th>
                                <td>
                                    {{ $user->userprof->address ?? '未設定' }}
                                </td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td>
                                    {{ $user->userprof->phone ?? '未設定' }}
                                </td>
                            </tr>
                            <tr>
                                <th>GitHub</th>
                                <td>
                                    <a href="{{ $user->userprof->github_url ?? null}}" target="_blank">{{ $user->userprof->github_url ?? '未設定' }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>自己紹介</th>
                                <td>
                                    {!! $user->userprof->prof_text ?? '未設定' !!}
                                </td>
                            </tr>
                        </table>
                        @if (Auth::id() == $user->id)
                        <div class="form-buttons text-center">
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">プロフィールの編集</a>
                        </div>
                        @endif
                    </section>

                    <section class="book_list">
                        <h4>登録した本の一覧</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="item_name"><i class="fa-solid fa-book"></i>書籍名</th>
                                    <th class="item_category"><i class="fa-solid fa-table-columns"></i>カテゴリー</th>
                                    <th class="item_price"><i class="fa-solid fa-yen-sign"></i>金額</th>
                                    <th class="item_published_at"><i class="fa-regular fa-calendar"></i>出版日</th>
                                    <th class="item_review"><i class="fa-regular fa-comment-dots"></i>投稿者の書評</th>
                                    <th class="item_edit">&nbsp;</th>
                                    <th class="item_delete">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <td class="item_name">
                                        <a href="{{ route('books.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a>
                                    </td>
                                    <td class="item_category">
                                        {{ $book->category->name }}
                                    </td>
                                    <td class="item_price">
                                        @if ($book->item_price != 0) {{ number_format($book->item_price)}} 円 @endif
                                    </td>
                                    <td class="item_published_at">
                                        {{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') }}
                                    </td>
                                    <td class="item_review">
                                        {{ Str::limit($book->item_review, 100) }}
                                    </td>
                                    @if (Auth::id() == $book->user->id)
                                        <td class="item_edit">
                                            <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-primary">編集</a>
                                        </td>
                                        <td class="item_delete">
                                            <form method="POST" action="{{ route('books.destroy', ['id' => $book->id]) }}">
                                                @csrf
                                                <button type="button" class="btn btn-danger js-delete">削除</button>
                                            </form>
                                        </td>
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-buttons text-center">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">TOPに戻る</a>
                        </div>
                    </section>

                    @if (Auth::id() == $user->id)
                    <hr>
                    <section>
                        <h4>パスワード変更</h4>
                        <div class="form-buttons">
                            <a href="{{ route('user.change_pass') }}" class="btn btn-primary">パスワードを変更する</a>
                        </div>
                    </section>
                    <section>
                        <h4>退会処理</h4>
                        <div class="form-buttons">
                            <form method="POST" action="{{ route('user.destroy', ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger js-delete">退会処理を行う</button>
                            </form>
                        </div>
                    </section>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
