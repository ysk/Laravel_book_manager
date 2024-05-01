@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><i class="fa-regular fa-rectangle-list"></i>技術書一覧</div>
                <div class="card-body">
                @if($books->count() > 0)
                <div class="search-results">
                    <p>{{$books->count()}} 件がヒットしました。</p>
                </div>
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th class="item_thumbnail"></th>
                            <th class="item_name"><i class="fa-solid fa-book"></i>書籍名</th>
                            <th class="item_category"><i class="fa-solid fa-table-columns"></i>カテゴリー</th>
                            <th class="item_published_at"><i class="fa-regular fa-calendar"></i>出版日</th>
                            <th class="item_review"><i class="fa-regular fa-comment-dots"></i>投稿者の書評</th>
                            <th class="item_user_id"><i class="fa-solid fa-user-pen"></i>投稿者</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                    @foreach ($books as $book)
                        <tr>
                            <td class="item_thumbnail">
                                <div class="thumbnail">
                                    @if($book->item_thumbnail)
                                        <img src="{{ asset('storage/uploads/' . $book->item_thumbnail) }}" alt="{{ $book->item_name }}" class="img-thumbnail" style="width: 150px">
                                    @else
                                        <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                                    @endif
                                </div>
                            </td>
                            <td class="item_name">
                                <a href="{{ route('books.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a>
                            </td>
                            <td class="item_category">
                                <a href="/books/search?category_id={{$book->category->id }}">{{$book->category->name }}</a>
                            </td>
                            <td class="item_published_at">
                                {{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') ?? '未設定'  }}
                            </td>
                            <td class="item_review">
                                {{ Str::limit($book->item_review, 200) ?? '未設定'  }}
                            </td>
                            <td class="item_user_id">
                                {{ $book->user->name ?? null }}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination justify-content-center mt-3">
                    {{ $books->links() }}
                </div>
                @else
                <div class="search-results">
                    <p>検索結果はありませんでした</p>
                </div>
                @endif
                <!-- // コンテンツ -->
            </div>  </div>
        </div>
    </div>
</div>
@endsection
