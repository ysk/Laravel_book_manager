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
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
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
                                    <td>{{ $book->id }}</td>
                                    <td><a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a></td>
                                    <td>{{ $book->item_number }}</td>
                                    <td>{{ $book->item_amount }}</td>
                                    <td>{{ $book->published }}</td>
                                    @if (Auth::check())
                                        <td><a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-secondary">編集</a></td>
                                        <td>
                                            <form method="POST" action="{{ route('book.destroy', ['id' => $book->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">削除</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- // コンテンツ -->


                    <div class="form-buttons text-center">
                        <a href="{{ route('book.create') }}" class="btn btn-primary" >新規登録</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
