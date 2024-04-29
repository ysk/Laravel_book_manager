@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-user"></i>{{ $user->name }}さんのマイページ</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    <!-- コンテンツ -->
                    <section class="user_info">
                    <h4>パスワード変更</h4>
                    <form action="{{ route('user.update_pass') }}" method="post">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="old_password" class="col-md-4 col-form-label text-md-right">現在のパスワード</label>
                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control" name="old_password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">新しいパスワード</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">新しいパスワード（確認）</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    パスワードを変更
                                </button>
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">TOPに戻る</a>
                            </div>
                        </div>
                    </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
