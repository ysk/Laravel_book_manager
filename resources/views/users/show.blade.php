@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- コンテンツ -->
                    <h4>{{ $user->name }} さんの本棚</h4>

                    @if(isset($user->userprof->user_id))
                    <table class="table">
                        <tr>
                            <th>住所</th>
                            <td>{{ $user->userprof->address }}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{ $user->userprof->phone }}</td>
                        </tr>
                        <tr>
                            <th>GitHub</th>
                            <td>{{ $user->userprof->github_url }}</td>
                        </tr>
                    </table>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>書籍名</th>
                                <th>カテゴリー</th>
                                <th>金額</th>
                                <th>発売日</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td><a href="{{ route('book.show', ['id' => $book->id]) }}">{{ $book->item_name }}</a></td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ number_format($book->item_amount)}} 円</td>
                                <td>{{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') }}</td>
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
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
