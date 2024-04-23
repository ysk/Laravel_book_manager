@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール</div>

                <div class="card-body">
                    <p>Webデザイナー、コーダー</p>
                    <p>フロントエンドエンジニア、バクエンドエンジニア</p>
                    <p>AWSエンジニアを経て、</p>
                    <p>今年からSREエンジニアとして働きます。</p>

                    <a href="{{ route('contact.show') }}" class="btn btn-primary mt-3">お問い合わせはこちら</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
