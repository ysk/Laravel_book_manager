@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><i class="fa-regular fa-rectangle-list"></i>技術書一覧</div>
                <div class="card-body">
                    <!-- コンテンツ -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

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
                            <tr class="tr">
                                <td class="td item_thumbnail">
                                    <div class="thumbnail">
                                        @if($book->item_thumbnail)
                                            <img src="{{ asset('storage/uploads/' . $book->item_thumbnail) }}" alt="{{ $book->item_name }}" class="img-thumbnail" style="width: 150px">
                                        @else
                                            <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                                        @endif
                                    </div>
                                </td>
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
                                        <a href="/books/search?category_id={{$book->category->id }}">{{$book->category->name }}</a>
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
                                        {{ Str::limit($book->item_review, 200) ?? '未設定'   }}
                                    </p>
                                </td>
                                <td class="td item_user_id">
                                    <div class="th">
                                        <i class="fa-solid fa-user-pen"></i><span class="text">投稿者</span>
                                    </div>
                                    <p>
                                        <a href="{{ route('user.show', ['id' =>$book->user->id]) }}">{{ $book->user->name }}</a>
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination justify-content-center mt-3">
                        {{ $books->links() }}
                    </div>

                    <div class="pagination justify-content-center" style="margin-top: 20px;">
                        <a href="{{ route('books.create') }}" class="btn btn-primary" ><i class="fa-regular fa-pen-to-square"></i>本を登録する</a>
                    </div>
                    <!-- // コンテンツ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
