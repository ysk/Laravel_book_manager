@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ __('Dashboard') }}</span>
                        <form action="{{-- route('book.search') --}}" method="GET" style="display: flex;">
                            <div class="form-group mr-2">
                                <input type="text" class="form-control" name="query" placeholder="検索">
                            </div>
                            <button type="submit" class="btn btn-primary">検索</button>
                        </form>
                    </div>
                </div>
                
                
                
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
                                {{-- <th>#</th> --}}
                                
                                <th></th>
                                <th>書籍名</th>
                                <th>カテゴリ</th>
                                <th>金額</th>
                                <th>発売日</th>
                                <th>投稿者</th>
                                <th>書評</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    {{-- <td>{{ $book->id }}</td> --}}
                                   
                                    <td>
                                        <div class="thumbnail">
                                            <img src="https://placehold.jp/100x120.png" alt="ダミー画像" class="img-thumbnail">
                                        </div></td>
                                    <td><a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a></td>
                                    <td>{{ $book->category ? $book->category->name : '-' }}</td>


                                    <td>{{ number_format($book->item_amount)}} 円</td>
                                    <td>{{ $book->published->format('Y年m月d日') }}</td>
                                    <td>{{ $book->user->name }}</td>
                                    <td>{{ $book->item_review }}</td>
                                    <td>
                                        @if (Auth::id()==$book->user->id)
                                            <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-secondary">編集</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::id()==$book->user->id)
                                            <form method="POST" action="{{ route('book.destroy', ['id' => $book->id]) }}">
                                                @csrf
                                                <button type="button" class="btn btn-danger js-delete">削除</button>
                                            </form>
                                        @endif
                                    </td>
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
