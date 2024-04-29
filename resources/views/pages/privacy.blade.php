@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">プライバシーポリシー</div>

                <div class="card-body">
                    <div class="entry-content hatenablog-entry">
                        <section>
                            <h2>当サイトにおける個人情報の取扱いについて</h2>
                            <p>以下のとおりにプライバシーポリシーを定めます。</p>
                        </section>

                        <section>
                            <h2 id="operator-info">運営者情報</h2>
                            <p>運営者：YusukeIkeda<br>
                                お問い合わせ：yusuke.micmic★gmail.com（★を＠に変えてください）</p>
                        </section>

                        <section>
                            <h2 id="usage-purpose">個人情報の利用目的</h2>
                            <p>当サイトでは、メールでのお問い合わせやコメントの際に、お名前（ハンドルネーム）・メールアドレス等の個人情報をご登録いただく場合があります。これらの個人情報は、質問に対する回答や必要な情報をご連絡するために利用し、それ以外の目的では利用しません。</p>
                        </section>

                        <section>
                            <h2 id="third-party-disclosure">個人情報の第三者への開示</h2>
                            <p>個人情報は適切に管理し、以下に該当する場合を除いて第三者に開示することはありません。</p>
                            <ul>
                                <li>本人のご了解がある場合</li>
                                <li>法令等への協力のため、開示が必要となる場合</li>
                            </ul>
                        </section>

                        <section>
                            <h2 id="information-management">個人情報の管理</h2>
                            <p>個人情報の開示・訂正・追加・削除・利用停止をご希望の場合には、ご本人であることを確認したうえで、速やかに対応致します。</p>
                        </section>

                        <section>
                            <h2 id="about-cookies">Cookieについて</h2>
                            <p>当サイトでは、一部のコンテンツにおいてCookieを利用しています。Cookieとは、webコンテンツへのアクセスに関する情報であり、お名前・メールアドレス・住所・電話番号は含まれません。また、お使いのブラウザ設定からCookieを無効にすることが可能です。</p>
                        </section>

                        <section>
                            <h2 id="advertising-delivery">広告の配信について</h2>
                            <p>当サイトは第三者配信の広告サービス（Google Adsense、Amazon アソシエイト、A8.net）を利用しています。広告配信事業者は、過去にアクセスしたサイトの情報に基づきユーザーの興味に応じた広告を表示するためにCookie（クッキー）を使用することがあります。</p>
                        </section>

                        <section>
                            <h2 id="access-analysis-tools">アクセス解析ツールについて</h2>
                            <p>当サイトでは、Google Inc.が提供するアクセス解析ツール「Googleアナリティクス」を利用しています。Googleアナリティクスは、トラフィックデータの収集のためにCookieを使用しています。このトラフィックデータは匿名で収集されており、個人を特定するものではありません。</p>
                        </section>

                        <section>
                            <h2 id="comments-on-site">当サイトへのコメントについて</h2>
                            <p>当サイトでは、スパム・荒らしへの対応として、コメントの際に使用されたIPアドレスを記録しています。コメントには、特定の自然人または法人を誹謗し、中傷するものや、極度にわいせつな内容を含むもの、禁制品の取引に関するものや、他者を害する行為の依頼など、公序良俗に反する内容を含む場合は削除される場合があります。</p>
                        </section>

                        <section>
                            <h2 id="copyright">著作権について</h2>
                            <p>当サイトで掲載している画像の著作権・肖像権等は各権利所有者に帰属します。権利を侵害する目的ではありません。当サイトのコンテンツ（記事・画像・その他プログラム）について、許可なく転載することを禁じます。</p>
                        </section>

                        <section>
                            <h2 id="disclaimer">免責事項</h2>
                            <p>当サイトからリンクやバナーなどによって他のサイトに移動した場合、移動先サイトで提供される情報、サービス等について一切の責任を負いません。当サイトのコンテンツについて、可能な限り正確な情報を掲載するよう努めていますが、誤情報が入り込んだり、情報が古くなっている場合があります。</p>
                        </section>

                        <section>
                            <h2 id="policy-changes">プライバシーポリシーの変更について</h2>
                            <p>当サイトは、個人情報に関して適用される日本の法令を遵守するとともに、本ポリシーの内容を適宜見直しその改善に努めます。修正された最新のプライバシーポリシーは常に本ページにて開示されます。</p>
                            <p>初出掲載：2024年5月6日</p>
                        </section>
                    </div>

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
