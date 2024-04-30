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
                        <form method="POST" action="{{ route('books.update', ['id' => $book->id]) }}">
                            @csrf
                            <table class="table">
                                <tr>
                                    <th><i class="fa-solid fa-book"></i> 書籍名</th>
                                    <td>
                                        <input type="text" name="item_name" value="{{ old('item_name', $book->item_name) }}" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-table-columns"></i> カテゴリー</th>
                                    <td>
                                        <select name="category_id" class="form-select">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-building"></i> 出版社</th>
                                    <td>
                                        <input type="text" name="publisher_name" value="{{ old('publisher_name', $book->publisher_name) }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-regular fa-calendar"></i> 出版日</th>
                                    <td>
                                        <input type="text" name="published_at" value="{{ old('published_at', $book->published_at) }}" class="form-control" id="js-datepicker">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-yen-sign"></i> 価格</th>
                                    <td>
                                        <input type="text" name="item_price" value="{{ old('item_price', $book->item_price) }}" class="form-control">
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
                                <a href="{{ route('books.show', ['id' => $book->id]) }}" class="btn btn-secondary" style="margin-right: 20px">戻る</a>
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
