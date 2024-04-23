@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">このサイトについて</div>



                <div class="card-body">


                    <h1>このサイトについて</h1>

                    みんながおすすめの技術書を共有して、行こうというサイト。<br>
                    もともとは管理人がLaravelの勉強のために作成したサイトだけどせっかくだから公開しようと思って今に至っています。<br>
                    最初はCRUDをローカルで確認してそのままお蔵入りのつもりだった。<br>


                    <h1>管理人について</h1>
                   web業界の黎明期に Webデザイナー兼コーダーで キャリアがスタートする。<br>
                   その後マークアップエンジニア、フロントエンドエンジニアとか呼ばれる職種で数社働いた後、<br>
                   バックエンドエンジニア、AWSエンジニアを経て、2024年からSREエンジニアとして新しいキャリアをスタート<br>
                   勉強しても勉強しても底なし沼のように知らないことが出てくるので年間数十冊は技術書を購入しており、頭の整理がつかなくなってきている状態。

                    <a href="{{ route('contact.show') }}" class="btn btn-primary mt-3">お問い合わせはこちら</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
