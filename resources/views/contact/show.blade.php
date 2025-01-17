@extends('common.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お問い合わせフォーム</div>
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

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">お名前</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact_form_data['name'] ?? null) }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">メールアドレス</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $contact_form_data['email'] ?? null) }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="message">メッセージ</label>
                            <textarea name="message" id="message" class="form-control" rows="5">{{ old('message', $contact_form_data['message'] ?? null) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">送信確認</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
