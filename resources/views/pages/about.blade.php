@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">このサイトについて</div>
                <div class="card-body">

                    <section class="section">
                        <h2>このサイトについて</h1>
                        <p>みんながおすすめの技術書を共有してみようという趣旨のサイト。<br>
                        もともとは管理人がLaravelの勉強のために作成したサイトだけどせっかくだから公開しようと思って今に至っています。<br>
                        最初はCRUDをローカルで確認したらそのまま捨てるつもりだった。</p>
                    </section>

                    <section class="section">
                        <h2>管理人について</h1>
                        <p>web業界の黎明期に Webデザイナー兼コーダーで キャリアがスタートする。<br>
                        その後マークアップエンジニア、フロントエンドエンジニアとか呼ばれる職種で数社働いた後、<br>
                        バックエンドエンジニア、AWSエンジニアを経て、2024年からSREエンジニアとして新しいキャリアをスタート<br>
                        勉強しても勉強しても底なし沼のように知らないことが出てくるので年間数十冊は技術書を購入しており、頭の整理がつかなくなってきている状態。</p>
                    </section>

                    <section class="section">
                        <h2>このサイトで使用されている技術</h1>
                        <p>Laravel、PHP、jQueryを使っています。<br>
                        もともと学習用に作り始めたサイトなので、色々仕様は変えていく予定です</p>
                    </section>

                    <a href="{{ route('contact.show') }}" class="btn btn-primary mt-3">お問い合わせはこちら</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
