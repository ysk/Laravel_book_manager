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
                        <h4>新規書籍登録</h4>
                        <form method="POST" action="{{ route('book.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="item_name" class="form-label">タイトル</label>
                                    <input type="text" name="item_name" value="" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="item_number" class="form-label">No</label>
                                    <input type="text" name="item_number" value="" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="item_amount" class="form-label">金額</label>
                                    <div class="input-group">
                                        <input type="text" name="item_amount" value="" class="form-control">
                                        <span class="input-group-text">円</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="published" class="form-label">出版日</label>
                                    <input type="text" name="published" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-buttons text-center">
                                <button type="submit" class="btn btn-primary" style="margin-right: 20px">登録</button>
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">戻る</a>
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
