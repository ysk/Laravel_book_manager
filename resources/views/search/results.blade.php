@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">技術書一覧</div>


                

                @if($books->count() > 0)
                {{$books->count()}} 件がヒットしました。
                
                <table>
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

</table>

    @else
   <p> 検索結果はありませんでした</p>

            @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
