@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-user"></i>{{ $user->name }}さんのマイページ</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- コンテンツ -->
                    <section class="user_info">
                    <h4>ユーザー情報</h4>
                    <table class="table">
                        <tr>
                            <th>アバター</th>
                            <td>
                                {{ $user->userprof->prof_thumbnail ?? 'なし' }}
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
                                <a href="{{ $user->userprof->github_url }}" target="_blank">{{ $user->userprof->github_url ?? '未設定' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>自己紹介</th>
                            <td>
                                {!! $user->userprof->prof_text ?? '未設定' !!}
                            </td>
                        </tr>
                    </table>
                    <div class="form-buttons text-center">
                        <a href="{{ route('profile.edit', ['id' => $user->id]) }}" class="btn btn-primary">プロフィールの編集</a>
                    </div>
                    </section>

                    <section class="book_list">
                    <h4>登録した本の一覧</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="item_id">&nbsp;</th>
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
                                <td class="item_id">
                                    {{ $book->id }}
                                </td>
                                <td class="item_name">
                                    <a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a>
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
                                        <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-primary">編集</a>
                                    </td>
                                    <td class="item_delete">
                                        <form method="POST" action="{{ route('book.destroy', ['id' => $book->id]) }}">
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
                    </section>

                    <div class="form-buttons text-center">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">TOPに戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
