@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-book"></i> 登録した本の編集</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    <!-- コンテンツ -->
                    <div class="book-details">
                        <h4>{{ $book->item_name }}</h4>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('book.update', ['id' => $book->id]) }}">
                            @csrf
                            <div class="thumbnail">
                                @if($book->item_thumbnail)
                                    <img src="{{ asset('storage/uploads/' . $book->item_thumbnail) }}" alt="{{ $book->item_name }}" class="img-thumbnail" style="width: 150px">
                                @else
                                    <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                                @endif
                            </div>

                            <table class="table">
                                <tr>
                                    <th><i class="fa-solid fa-book"></i> 書籍名</th>
                                    <td>
                                        <input type="text" name="item_name" value="{{ old('item_name', $book->item_name) }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-book"></i> カテゴリー</th>
                                    <td>
                                        <select name="category_id" class="form-select">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-yen-sign"></i> 価格</th>
                                    <td>
                                        <input type="text" name="item_price" value="{{ old('item_price', $book->item_price) }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-regular fa-calendar"></i> 出版日</th>
                                    <td>
                                        <input type="date" name="published_at" value="{{ old('published_at', $book->published_at) }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-regular fa-comment-dots"></i> 投稿者の書評</th>
                                    <td>
                                        <textarea name="item_review" class="form-control">{{ old('item_review', $book->item_review) }}</textarea>
                                    </td>
                                </tr>
                            </table>

                            <div class="form-buttons text-center">
                                <a href="{{ route('books.index') }}" class="btn btn-secondary" style="margin-right: 20px">TOPに戻る</a>
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $book->user_id }}">
                        </form>
                    </div>
                    <!-- // コンテンツ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
