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
                    <div class="book-details">
                        <h4>書籍詳細</h4>
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
                                <th>書籍の番号</th>
                                <td>{{ $book->item_number }}</td>
                            </tr>
                            <tr>
                                <th>書籍の価格</th>
                                <td>{{ $book->item_amount }}</td>
                            </tr>
                            <tr>
                                <th>書籍の出版日時</th>
                                <td>{{ $book->published }}</td>
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
