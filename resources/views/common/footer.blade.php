<footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
        <ul class="footer-list">
            <li class="footer-list-item">
                <a href="{{ route('pages.about') }}" class="text-white">Tech Cacheについて</a>
            </li>
            <li class="footer-list-item">
                <a href="{{ route('pages.privacy') }}" class="text-white">プライバシーポリシー</a>
            </li>
            <li class="footer-list-item">
                <a href="{{ route('contact.show') }}" class="text-white">お問い合わせ</a>
            </li>
        </ul>

        <div class="row mt-2">
            <div class="col">
                <span class="text-white">&copy; Tech Cache 2024</span>
            </div>
        </div>
    </div>
    <button class="pagetop js-pagetop">
        <span class="pagetop__arrow"></span>
    </button>
</footer>
