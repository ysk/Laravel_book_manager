@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    <!-- コンテンツ -->
                    <div class="book-form">
                        <h4>書籍更新</h4>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('book.update', ['id' => $book->id]) }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">カテゴリ</label>
                                    <select name="category_id" class="form-select">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <label for="item_name" class="form-label">書籍名</label>
                                    <input type="text" name="item_name" value="{{ old('item_name', $book->item_name) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="item_number" class="form-label">No</label>
                                    <input type="text" name="item_number" value="{{ old('item_number', $book->item_number) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="item_price" class="form-label">金額</label>
                                    <div class="input-group">
                                        <input type="text" name="item_price" value="{{ old('item_price', $book->item_price) }}" class="form-control">
                                        <span class="input-group-text">円</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="published_at" class="form-label">出版日</label>
                                    <input type="date" name="published_at" value="{{ old('published_at', $book->published_at) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <label for="item_review" class="form-label">書評</label>
                                    <textarea name="item_review" class="form-control">{{ old('item_review', $book->item_review) }}</textarea>
                                </div>
                            </div>
                            <div class="form-buttons text-center">
                                <a href="{{ route('books.index') }}" class="btn btn-secondary" style="margin-right: 20px">戻る</a>
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
