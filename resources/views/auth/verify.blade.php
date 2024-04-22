@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">メールアドレスの認証</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success">
                            新しい認証リンクがあなたのメールアドレスに送信されました。
                        </div>
                    @endif
                    続行する前に、認証リンクを含むメールを確認してください。
                    メールを受け取っていない場合は、
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            別のリクエストを送信するにはこちらをクリックしてください
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection