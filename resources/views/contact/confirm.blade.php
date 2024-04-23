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

                    <form action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <!-- 入力内容を表示 -->
                        <div>
                            <label>お名前</label>
                            <p>{{ $contact_form_data['name'] }}</p>
                        </div>
                        <div>
                            <label>メールアドレス</label>
                            <p>{{ $contact_form_data['email']  }}</p>
                        </div>
                        <div>
                            <label>メッセージ</label>
                            <p>{{ $contact_form_data['message']  }}</p>
                        </div>

                    
                    <!-- 戻るボタン -->
                    <a class="btn btn-secondary mt-3" href="{{ route('contact.show') }}" style="margin-right: 20px">戻る</a>

                        <button type="submit" class="btn btn-primary mt-3">送信</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
