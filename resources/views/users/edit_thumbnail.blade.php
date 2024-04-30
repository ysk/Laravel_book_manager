@extends('common.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-user"></i>{{ $user->name }}さんのプロフィール画像
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h4>サムネイル画像の更新</h4>
                    <!-- コンテンツ -->
                    <div class="book-details">
                        <div class="mt-3 mb-3">
                            <form method="POST" action="{{ route('user.update_thumbnail', ['id' => $user->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="thumbnail">
                                    @if(isset($user->userprof->prof_thumbnail))
                                    <img src="{{ asset('storage/uploads/' . $user->userprof->prof_thumbnail) }}" alt="{{ $user->name }}" class="img-thumbnail" style="width: 150px">
                                    @else
                                    <img src="{{ asset('images/no_image.png') }}" alt="No Image" class="img-thumbnail" style="width: 150px">
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <input type="file" name="prof_thumbnail" class="form-control" style="width: 50%;">
                                </div>
                                <div class="form-buttons text-center mt-3">
                                    <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-secondary" style="margin-right: 20px">戻る</a>
                                    <button type="submit" class="btn btn-primary">サムネイル画像の更新</button>
                                </div>
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

