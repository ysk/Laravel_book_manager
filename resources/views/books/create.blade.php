@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-book"></i> 新規登録</div>
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
                        <h4>技術書の情報を入力してください</h4>
                        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                            @csrf
                            <table class="table">
                                <tr>
                                    <th><i class="fa-regular fa-image"></i> 表紙画像</th>
                                    <td>
                                        <input type="file" name="item_thumbnail" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-book"></i> 書籍名</th>
                                    <td>
                                        <input type="text" name="item_name" value="{{ old('item_name') }}" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-table-columns"></i> カテゴリー</th>
                                    <td>
                                        <select name="category_id" class="form-select">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-building"></i> 出版社</th>
                                    <td>
                                        <input type="text" name="publisher_name" value="{{ old('publisher_name') }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-regular fa-calendar"></i> 出版日</th>
                                    <td>
                                        <input type="text" name="published_at" value="{{ old('published_at') }}" class="form-control" id="js-datepicker">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-solid fa-yen-sign"></i> 価格</th>
                                    <td>
                                        <input type="text" name="item_price" value="{{ old('item_price') }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa-regular fa-comment-dots"></i> 投稿者の書評</th>
                                    <td>
                                        <textarea name="item_review" class="form-control">{{ old('item_review') }}</textarea>
                                    </td>
                                </tr>
                            </table>

                            <div class="form-buttons text-center">
                                <a href="{{ route('books.index') }}" class="btn btn-secondary" style="margin-right: 20px">TOPに戻る</a>
                                <button type="submit" class="btn btn-primary">登録する</button>
                            </div>

                        </form>
                    </div>
                    <!-- // コンテンツ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
