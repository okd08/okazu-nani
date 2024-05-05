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
            <img src="/images/ie.jpeg" class="mx-auto">
            <p class="font-bold mt-5">☆工夫した点☆</p>
            <p>・表示にJavaScriptのslickやアコーディオンを使用し、食材の数が多くても画面が見やすくなるようにした。</p>
            <p>・登録した食材を賞味期限順に並び替えて表示し、登録日の背景色も賞味期限に応じて変えることで、賞味期限が切れそうな食材が一目でわかるようにした。</p>
            <p>・メモ機能を搭載し、従来の紙に書くことの利便性を損なわないようにした。</p>
            <a href="https://github.com/okd08/okazu-nani.git" target="_blank" title="GitHubリンク" class="flex items-center justify-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="text-xl transition-colors duration-200 hover:text-yellow-400 dark:hover:text-white" viewBox="0 0 1792 1792"><path d="M896 128q209 0 385.5 103t279.5 279.5 103 385.5q0 251-146.5 451.5t-378.5 277.5q-27 5-40-7t-13-30q0-3 .5-76.5t.5-134.5q0-97-52-142 57-6 102.5-18t94-39 81-66.5 53-105 20.5-150.5q0-119-79-206 37-91-8-204-28-9-81 11t-92 44l-38 24q-93-26-192-26t-192 26q-16-11-42.5-27t-83.5-38.5-85-13.5q-45 113-8 204-79 87-79 206 0 85 20.5 150t52.5 105 80.5 67 94 39 102.5 18q-39 36-49 103-21 10-45 15t-57 5-65.5-21.5-55.5-62.5q-19-32-48.5-52t-49.5-24l-20-3q-21 0-29 4.5t-5 11.5 9 14 13 12l7 5q22 10 43.5 38t31.5 51l10 23q13 38 44 61.5t67 30 69.5 7 55.5-3.5l23-4q0 38 .5 88.5t.5 54.5q0 18-13 30t-40 7q-232-77-378.5-277.5t-146.5-451.5q0-209 103-385.5t279.5-279.5 385.5-103zm-477 1103q3-7-7-12-10-3-13 2-3 7 7 12 9 6 13-2zm31 34q7-5-2-16-10-9-16-3-7 5 2 16 10 10 16 3zm30 45q9-7 0-19-8-13-17-6-9 5 0 18t17 7zm42 42q8-8-4-19-12-12-20-3-9 8 4 19 12 12 20 3zm57 25q3-11-13-16-15-4-19 7t13 15q15 6 19-6zm63 5q0-13-17-11-16 0-16 11 0 13 17 11 16 0 16-11zm58-10q-2-11-18-9-16 3-14 15t18 8 14-14z"></path></svg>
            </a>
        </div>
    </body>
</html>
