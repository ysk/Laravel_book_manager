<!-- contact.blade.php -->

@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お問い合わせフォーム</div>

                <div class="card-body">
                    <form method="POST" action="/contact">
                        @csrf

                        <div class="form-group">
                            <label for="name">お名前</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="message">メッセージ</label>
                            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">送信</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
