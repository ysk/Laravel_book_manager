<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Tech Cache β - みんなの技術書の本棚共有サイト</title>
<meta name="description" content="Tech Cache βはみんなの技術書の本棚共有サイトです">
<meta name="keywords" content="技術書, 本棚, 本棚共有,レビュー">
<link rel="icon" sizes="32x32" href="/favicon.ico" />
<link rel="icon" sizes="16x16" type="image/png" href="/favicon.png">
<title>Sample</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8682010241920340" crossorigin="anonymous"></script>
@vite([
    'resources/sass/app.scss',
    'resources/js/app.js'
    ])
</head>

<body id="{{isset($body_id) ? $body_id : 'pages'}}">

    <div id="app">

        @include('common.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('common.footer')

    </div>
</body>
</html>
