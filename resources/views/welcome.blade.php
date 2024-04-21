<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- ファビコン -->
        <link rel="shortcut icon" href="{{ asset('/logo.png') }}">
    </head>



    <body class="font-sans antialiased bg-lime-50">
        <div class="text-center mt-12 text-5xl lg:text-6xl font-bold tracking-widest text-lime-500 flex justify-center items-center">
            <p class="rounded-full bg-white p-3 border-4 border-lime-300">今</p>
            <p class="rounded-full bg-white p-1 border-4 border-lime-300 -ml-5 mt-5">日</p>
            <p class="text-4xl mt-5 ml-1">の</p>
            <p class="rounded-full bg-white p-3 border-4 border-lime-300">お</p>
            <p class="rounded-full bg-white p-1 border-4 border-lime-300 -ml-5 mt-5">か</p>
            <p class="rounded-full bg-white p-2 border-4 border-lime-300 -ml-3">ず</p>
            <p class="text-4xl mt-5 ml-1">は</p>
            <p class="rounded-full bg-white p-1 border-4 border-lime-300">？</p>
        </div>

        <div class="flex justify-center relative w-10/12 lg:w-8/10 mx-auto mb-10">
            <img src="/images/reizouko_open.png" alt="">
            @if (Route::has('login'))
                {{-- ログインしている場合 --}}
                @auth
                    <a href="{{ route('items.index') }}" class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-yellow-400 hover:bg-yellow-500 border-4 border-white text-white text-xl lg:text-3xl font-bold tracking-widest py-2 lg:py-4 px-4 lg:px-8 rounded">れいぞうこを開ける</button>
                    </a>
                {{-- ログインしていない場合 --}}
                @else
                    {{-- ログイン --}}
                    <a href="{{ url('login') }}" class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-yellow-400 hover:bg-yellow-500 border-4 border-white text-white text-xl lg:text-3xl font-bold tracking-widest py-2 lg:py-4 px-4 lg:px-8 rounded">れいぞうこを開ける</button>
                    </a>
                @endauth
            @endif
        </div>
        <p class="mb-12 -mt-12 text-sm text-gray-600 text-center">画像：いらすとや</p>

        <div class="text-center mb-20 w-10/12 lg:6/12 mx-auto">
            <p class="bg-white rounded-full w-8/12 lg:w-4/12 mx-auto py-3 border-dashed border-4 border-yellow-300 mb-5">家のれいぞうこに貼っていたメモを<br>ヒントに制作したシステムです。</p>
            <img src="/images/ie.jpeg" alt="" class="mx-auto">
            <p class="font-bold mt-5">☆工夫した点☆</p>
            <p>・表示にJavaScriptのslickやアコーディオンを使用し、食材の数が多くても画面が見やすくなるようにした。</p>
            <p>・登録した食材を賞味期限順に並び替えて表示し、登録日の背景色も賞味期限に応じて変えることで、賞味期限が切れそうな食材が一目でわかるようにした。</p>
            <p>・メモ機能を搭載し、従来の紙に書くことの利便性を損なわないようにした。</p>
        </div>
    </body>
</html>
