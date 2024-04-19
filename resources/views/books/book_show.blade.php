@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- コンテンツ -->
                    <div class="book-details">
                        <h4>{{ $book->user->name }}さんが投稿した書籍詳細</h4>


                        <img src="https://placehold.jp/100x120.png" alt="ダミー画像" class="img-thumbnail">

                        
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $book->id }}</td>
                            </tr>
                            <tr>
                                <th>書籍名</th>
                                <td>{{ $book->item_name }}</td>
                            </tr>
                            <tr>
                                <th>価格</th>
                                <td>{{ $book->item_amount }}円</td>
                            </tr>
                            <tr>
                                <th>発売日</th>
                                <td>{{ $book->published->format('Y年m月d日') }}</td>
                            </tr>

                            <tr>
                                <th>レビュー</th>
                                <td>{{ $book->item_review }}</td>
                            </tr>
                        </table>
                        <div class="form-buttons text-center">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary" >戻る</a>
                        </div>
                    </div>
                    <!-- // コンテンツ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
