@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-book"></i>書籍情報詳細</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- コンテンツ -->
                    <div class="book-details">
                        <h4>{{ $book->item_name }}</h4>
                        <div class="thumbnail">
                            @if($book->item_thumbnail)
                                <img src="{{ asset('storage/uploads/' . $book->item_thumbnail) }}" alt="{{ $book->item_name }}" class="img-thumbnail" style="width: 150px">
                            @else
                                <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                            @endif
                        </div>
                        <table class="table">
                            <tr>
                                <th><i class="fa-solid fa-user-pen"></i>投稿者</th>
                                <td>{{ $book->user->name }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa-solid fa-book"></i>書籍名</th>
                                <td>{{ $book->item_name }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa-solid fa-yen-sign"></i>価格</th>
                                <td>
                                    @if ($book->item_price != 0)
                                    {{ number_format($book->item_price)}} 円
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th><i class="fa-regular fa-calendar"></i>出版日</th>
                                <td>
                                    {{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') }}
                                </td>
                            </tr>
                            <tr>
                                <th><i class="fa-regular fa-comment-dots"></i>投稿者の書評</th>
                                <td>
                                    {!! nl2br( $book->item_review) !!}
                                </td>
                            </tr>
                        </table>



                        <div class="form-buttons text-center">
                            @if (Auth::id() == $book->user->id)
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-primary">編集</a>
                            @endif
                            <a href="{{ route('books.index') }}" class="btn btn-secondary" >TOPに戻る</a>
                        </div>
                    </div>
                    <!-- // コンテンツ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
