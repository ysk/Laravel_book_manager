@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tech Cacheについて</div>
                <div class="card-body">

                    <section class="section">
                        <h2>Tech Cacheについて</h2>
                        <p>
                        Tech Cachは積読になりがちな技術書の整理と、みんなが読んでいるおすすめ技術書の共有ができたらいいなという趣旨のサイトです。<br>
                        もともとは管理人がLaravelのキャッチアップの為に作成したサイトで公開するつもりはなかったのですが、作っている途中で気が変わり、今に至っています。<br>
                        今後もキャッチアップの必要に応じて他の言語で書き直したりするかもしれません。とりあえずRuby on Railsで書き直したい。<br>

                        <h3>サイト名について</h3>
                        <p>
                        名付けの親はChatGPTさん。10個くらい候補を出してもらいました。<br>
                        Tech Cacheは技術書で得た知見をキャッシュしていくという由来が気にいって採用しました。
                        </p>

                        <h3>使用されている技術について</h3>
                        <p>
                        フロントエンド：JavaScript（jQuery）<br>
                        バックエンド：PHP（Laravel）<br>
                        サーバー：Amazon LightSail（VPS）<br>
                        ドメイン：Route53 <br>
                        SSL/TLS証明書：Let's Encrypt<br>
                        SMPT：Gmail<br>
                        DI/CD関連：特になし（Jenkinsを試す予定）<br>
                        <br>
                        もともとは自己学習が目的で作り始めたサイトなので、今後も仕様はいろいろ変えていく予定です。<br>
                        とりあえずフロントエンドにNext.jsとか導入してみたい。<br>
                        <br>
                        ※ちなみに、デプロイに時間をかけたくなくて簡単と聞いていたAmazon LightSailを採用したのですが、<br>
                        普通にEC2インスタンス立ち上げるほうがよっぽど簡単な気がしました。<br>
                        特に証明書周り。ACMも使えるようですがLightSailで完結させる為に<a href="https://letsencrypt.org/ja/">Let's Encrypt</a>を使用しました。<br>
                        とても初心者向けのサービスとは思えなかったです。
                        </p>
                    </section>

                    <section class="section">
                        <h2>管理人について</h1>
                        <p>web業界の黎明期よりWebデザイナー兼コーダーで働いていました。<br>
                        その後、デザインよりマークアップの方が得意になり、フロントエンドエンジニアと呼ばれる職種で数社働いた後<br>
                        バックエンドエンジニア、AWSエンジニアを経て、2024年からSREエンジニアとして新しいキャリアをスタートします。<br>
                        SREエンジニアとしてキャリアを再スタートさせるにあたって、忘れかけているバックエンドの技術を思い出す意味でこのサイトを作りました。</p>
                    </section>

                    <div class="form-buttons text-center">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3" style="margin-right: 20px">戻る</a>
                        <a href="{{ route('contact.show') }}" class="btn btn-primary mt-3">お問い合わせはこちら</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
