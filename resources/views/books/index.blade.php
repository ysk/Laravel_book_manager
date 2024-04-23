@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">投稿された技術書一覧</div>

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
                                <th class="item_name">書籍名</th>
                                <th class="item_category">カテゴリー</th>
                                <th class="item_published_at">出版日</th>
                                <th class="item_review">書評</th>
                                <th class="item_user_id">投稿者</th>
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
                                    <a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a>
                                </td>
                                <td class="item_category">
                                    <a href="/books/search?category_id={{$book->category->id }}">{{$book->category->name }}</a>
                                </td>
                                <td class="item_published_at">
                                    {{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') }}
                                </td>
                                <td class="item_review">
                                    {{ Str::limit($book->item_review, 200) }}
                                </td>
                                <td class="item_user_id">
                                    <a href="{{ route('profile.show', ['id' =>$book->user->id]) }}">{{ $book->user->name }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination justify-content-center mt-3">
                        {{ $books->links() }}
                    </div>

                    <div class="pagination justify-content-center" style="margin-top: 20px;">
                        <a href="{{ route('book.create') }}" class="btn btn-primary" >新規登録</a>
                    </div>
                    <!-- // コンテンツ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
