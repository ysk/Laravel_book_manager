@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>投稿者</th>
                                <th>書籍名</th>
                                <th>金額</th>
                                <th>発売日</th>
                                <th>書評</th>
                                @if (Auth::check())
                                    <th>編集</th>
                                    <th>削除</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->user->name }}</td>
                                    <td>                                    <div class="thumbnail">
                                        <img src="https://placehold.jp/100x120.png" alt="ダミー画像" class="img-thumbnail">
                                    </div></td>
                                    <td><a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a></td>
                                    <td>{{ number_format($book->item_amount)}} 円</td>
                                    <td>{{ $book->published->format('Y年m月d日') }}</td>
                                    <td>{{ $book->item_review }}</td>
                                    @if (Auth::check())
                                        <td><a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-secondary">編集</a></td>
                                        <td>
                                            <form method="POST" action="{{ route('book.destroy', ['id' => $book->id]) }}">
                                                @csrf
                                                <button type="button" class="btn btn-danger js-delete">削除</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- // コンテンツ -->
                    <div class="pagination justify-content-center mt-3">
                        {{ $books->links() }}
                    </div>

                    <div class="pagination justify-content-center" style="margin-top: 20px;">
                        <a href="{{ route('book.create') }}" class="btn btn-primary" >新規登録</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
