@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- コンテンツ -->
                    <div class="book-form">
                        <h4>書籍情報更新</h4>
                        <form method="POST" action="{{ route('book.update', ['id' => $book->id]) }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="item_name" class="form-label">書籍名</label>
                                    <input type="text" name="item_name" value="{{ $book->item_name }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="item_number" class="form-label">No</label>
                                    <input type="text" name="item_number" value="{{ $book->item_number }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="item_amount" class="form-label">金額</label>
                                    <input type="text" name="item_amount" value="{{ $book->item_amount }}" class="form-control"> 円
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="published" class="form-label">出版日</label>
                                    <input type="text" name="published" value="{{ $book->published }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-buttons text-center">
                                <a href="{{ route('books.index') }}" class="btn btn-secondary" style="margin-right: 20px">戻る</a>
                                <button type="submit" class="btn btn-primary">更新</button>
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
