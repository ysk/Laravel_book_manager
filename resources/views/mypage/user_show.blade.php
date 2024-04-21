@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- コンテンツ -->
                    <h4>{{ $user->name }}さんの読書履歴</h4>

                    @if(isset($user->userprof->user_id))
                    <table class="table"><tr>
                        <tr>
                            <th>住所</th>
                            <td> {{$user->userprof->address}}</td>
                        <tr>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td> {{$user->userprof->phone}}</td>
                        </tr>
                        <tr>
                            <th>GitHub</th>
                            <td> {{$user->userprof->github_url}}</td>
                        </tr>
                    </thead>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>アイテム名</th>
                                <th>アイテム番号</th>
                                <th>アイテム金額</th>
                                <th>公開日</th>
                                @if (Auth::check())
                                    <th>編集</th>
                                    <th>削除</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->user_id }}</td>
                                    <td>{{ $book->id }}</td>
                                    <td><a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a></td>
                                    <td>{{ $book->item_number }}</td>
                                    <td>{{ $book->item_amount }}</td>
                                    <td>{{ $book->published }}</td>
                                    @if (Auth::check())
                                        <td><a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-primary">編集</a></td>
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
                    <div class="form-buttons text-center">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary" >戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
