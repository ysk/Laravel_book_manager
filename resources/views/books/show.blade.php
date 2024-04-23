@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">書籍情報詳細</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- コンテンツ -->
                    <div class="book-details">
                        <h4>{{ $book->item_name }}</h4>
                        <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                        <table class="table">
                            <tr>
                                <th>投稿者</th>
                                <td>{{ $book->user->name }}</td>
                            </tr>
                            <tr>
                                <th>書籍名</th>
                                <td>{{ $book->item_name }}</td>
                            </tr>
                            <tr>
                                <th>価格</th>
                                <td>
                                    @if ($book->item_amount != 0)
                                    {{ number_format($book->item_amount)}} 円
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>発売日</th>
                                <td>
                                    {{ Carbon\Carbon::parse($book->published_at)->format('Y年m月d日') }}
                                </td>
                            </tr>
                            <tr>
                                <th>書評</th>
                                <td>
                                    {!! nl2br( $book->item_review) !!}
                                </td>
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
