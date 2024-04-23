<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>TECH CACHE</title>
<link rel="dns-prefetch" href="//fonts.bunny.net">

<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">

<link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        @include('common.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('common.footer')

    </div>
</body>
</html>
