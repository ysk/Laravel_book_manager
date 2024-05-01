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
                        <h4 class="section_title">ユーザー情報</h4>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th></th>
                                <td>
                                    <div class="thumbnail">
                                        @if(isset($user->userprof->prof_thumbnail))
                                            <img src="{{ asset('storage/uploads/' . $user->userprof->prof_thumbnail) }}" alt="{{ $user->name }}" class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail">
                                        @endif
                                    </div>
                                    @if (Auth::id() == $user->id)
                                        <a href="{{ route('user.edit_thumbnail', ['id' => $user->id]) }}">サムネイル画像の更新</a>
                                    @endif
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
                                    {!! nl2br($user->userprof->prof_text) ?? '未設定' !!}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        @if (Auth::id() == $user->id)
                            <div class="form-buttons text-center">
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">プロフィールの編集</a>
                            </div>
                        @endif
                    </section>

                    <section class="total_price">
                        <h4 class="section_title">登録した技術書の合計金額</h4>
                        <p class="price">{{ number_format($totalPrice) }} <span>円</span></p>
                        <p class="notice">※合計金額はすべて定価で購入した場合の金額です</p>
                        <h4 class="section_title">よく購入する出版社</h4>
                        @foreach ($publisherResults as $result)
                            {{ $result->publisher_name }} {{ $result->COUNT }} 冊<br>
                        @endforeach
                    </section> 

                    <section class="book_list">
                        <h4 class="section_title">登録した本の一覧</h4>
                        <table class="table">
                            <thead class="thead">
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
                            <tbody class="tbody">
                                @foreach ($books as $book)
                                <tr class="tr">
                                    <td class="td item_name">
                                        <div class="th">
                                            <i class="fa-solid fa-book"></i><span class="text">書籍名</span>
                                        </div>
                                        <p>
                                            <a href="{{ route('books.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a>
                                        </p>
                                    </td>
                                    <td class="td item_category">
                                        <div class="th">
                                            <i class="fa-solid fa-table-columns"></i><span class="text">カテゴリー</span>
                                        </div>
                                        <p>
                                            {{ $book->category->name }}
                                        </p>
                                    </td>
                                    <td class="td item_price">
                                        <div class="th">
                                            <i class="fa-solid fa-yen-sign"></i><span class="text">金額</span>
                                        </div>
                                        <p>
                                            @if ($book->item_price != 0) {{ number_format($book->item_price)}} 円 @endif
                                        </p>
                                    </td>
                                    <td class="td item_published_at">
                                        <div class="th">
                                            <i class="fa-regular fa-calendar"></i><span class="text">出版日</span>
                                        </div>
                                        <p>
                                            {{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') ?? '未設定'   }}
                                        </p>
                                    </td>
                                    <td class="td item_review">
                                        <div class="th">
                                            <i class="fa-regular fa-comment-dots"></i><span class="text">投稿者の書評</span>
                                        </div>
                                        <p>
                                            {{ Str::limit($book->item_review, 100) ?? '未設定'   }}
                                        </p>
                                    </td>
                                    @if (Auth::id() == $book->user->id)
                                        <td class="td item_edit">
                                            <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-primary">編集</a>
                                        </td>
                                        <td class="td item_delete">
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
                    <section class="change_pass">
                        <h4 class="section_title">パスワード変更</h4>
                        <div class="form-buttons">
                            <a href="{{ route('user.change_pass') }}" class="btn btn-primary">パスワードを変更する</a>
                        </div>
                    </section>
                    <section class="user_destroy">
                        <h4 class="section_title">退会処理</h4>
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
