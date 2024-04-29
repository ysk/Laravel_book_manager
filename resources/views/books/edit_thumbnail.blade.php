@extends('common.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-book"></i> 登録したサムネイルの編集</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    <!-- コンテンツ -->
                    <div class="book-details">
                        <h4>{{ $book->item_name }}</h4>
                        <div class="mt-3 mb-3">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('books.update_thumbnail', ['id' => $book->id]) }}">
                                @csrf
                                <div class="thumbnail">
                                    @if($book->item_thumbnail)
                                        <img src="{{ asset('storage/uploads/' . $book->item_thumbnail) }}" alt="{{ $book->item_name }}" class="img-thumbnail" style="width: 150px">
                                    @else
                                        <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <input type="file" name="item_thumbnail" value="" class="form-control" style="width: 50%;">
                                </div>
                                <div class="form-buttons text-center mt-3">
                                    <a href="{{ route('books.show', ['id' => $book->id]) }}" class="btn btn-secondary" style="margin-right: 20px">戻る</a>
                                    <button type="submit" class="btn btn-primary">サムネイル画像の更新</button>
                                </div>
                                <input type="hidden" name="user_id" value="{{ $book->user_id }}">
                            </form>
                        </div>
                    </div>
                    <!-- // コンテンツ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
