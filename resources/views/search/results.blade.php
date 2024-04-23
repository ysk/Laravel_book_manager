@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">技術書一覧</div>

                @if($books->count() > 0)
                <div class="search-results">
                    <p>{{$books->count()}} 件がヒットしました。</p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>書籍名</th>
                            <th>カテゴリー</th>
                            <th>金額</th>
                            <th>発売日</th>
                            <th>投稿者</th>
                            <th>書評</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>
                                <div class="thumbnail">
                                    @if($book->item_thumbnail)
                                        <img src="{{ asset('storage/uploads/' . $book->item_thumbnail) }}" alt="{{ $book->item_name }}" class="img-thumbnail" style="width: 150px">
                                    @else
                                        <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a>
                            </td>
                            <td>
                                <a href="/books/search?category_id={{$book->category->id }}">{{$book->category->name }}</a>
                            </td>
                            <td>
                                @if ($book->item_amount != 0)
                                    {{ number_format($book->item_amount)}} 円
                                @endif
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') }}
                            </td>
                            <td>
                                {{ $book->user->name }}
                            </td>
                            <td>
                                {{ Str::limit($book->item_review, 200) }}
                            </td>
                            <td>
                                @if (Auth::id()==$book->user->id)
                                    <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-secondary">編集</a>
                                @endif
                            </td>
                            <td>
                                @if (Auth::id()==$book->user->id)
                                    <form method="POST" action="{{ route('book.destroy', ['id' => $book->id]) }}">
                                        @csrf
                                        <button type="button" class="btn btn-danger js-delete">削除</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div class="pagination justify-content-center mt-3">
                    {{ $books->links() }}
                </div>

                @else

                    <p>検索結果はありませんでした</p>

                @endif
                    <!-- // コンテンツ -->

            </div>
        </div>
    </div>
</div>
@endsection
