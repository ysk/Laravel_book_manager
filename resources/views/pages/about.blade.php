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
                        <p>Tech Cachは積読になりがちな技術書の整理と、どんなエンジニアがどんな本を読んでいるのかを共有できたらいいなという趣旨のサイトです。<br>
                        もともとは管理人がLaravelのキャッチアップの為に作成したサイトですが、作っている途中で『せっかくだから公開しよう』と思い、今に至っています。<br>
                        今後はキャッチアップの必要に応じて他の言語で書き直したりするかもしれません。とりあえずRailsで書き直すかも。<br>


                        <h3>サイト名について</h3>
                        <p>名付けの親はChatGPTさん。<br>技術書で得た知見をキャッシュしていくという由来が気にいって採用しました。</p>

                        <h3>使用されている技術について</h3>
                            <p>
                            Laravel、PHP、jQueryを使っています。<br>
                            もともと学習用に作り始めたサイトなので、色々仕様は変えていく予定です。<br>
                            Next.jsとか導入したい。</p>
                    </section>

                    <section class="section">
                        <h2>管理人について</h1>
                        <p>web業界の黎明期に Webデザイナー兼コーダーで働いていました。<br>
                        その後、デザインよりマークアップの方が得意になり、フロントエンドエンジニアと呼ばれる職種で数社働いた後<br>
                        バックエンドエンジニア、AWSエンジニアを経て、2024年からSREエンジニアとして新しいキャリアをスタートします。<br>
                        SREエンジニアとしてキャリアを再スタートさせるにあたって忘れかけているバックエンドの技術を思い返す意味でこのサイトを作りましたがせっかくなので公開しようということで今に至っています。</p>
                    </section>



                    <a href="{{ route('contact.show') }}" class="btn btn-primary mt-3">お問い合わせはこちら</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
