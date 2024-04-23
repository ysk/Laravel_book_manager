<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>TECH CACHE</title>
<link rel="dns-prefetch" href="//fonts.bunny.net">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

@vite([
    'resources/sass/app.scss',
    'resources/js/app.js'
    ])
</head>

@if(isset($body_id))   
<body id="{{$body_id}}">
@else
<body>
@endif
    <div id="app">

        @include('common.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('common.footer')

    </div>
</body>
</html>
