<x-app-layout>
    @section('title', 'ホーム')
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-600 leading-tight">
            ホーム
        </h2>
    </x-slot>

    {{-- フラッシュメッセージ --}}
    @if(session('success'))
    <div class="mt-2 mb-2 bg-green-100 text-green-700 rounded-lg p-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- 登録ボタン --}}
                <a href="{{ route('items.create') }}" class="mt-5 flex justify-center w-5/12 lg:w-3/12 mx-auto">
                    <button class="bg-yellow-400 hover:bg-yellow-500 border-4 border-white text-white text-lg lg:text-xl font-bold tracking-wider py-2 px-4 rounded-lg mb-10">食材のとうろく</button>
                </a>
                {{-- れいぞうこ --}}
                <div class="lg:w-5/12 mx-auto pt-2 pb-5">
                    {{-- <img src="/images/reizouko.png" class="w-full"> --}}
                    <div class="border-4 rounded-lg py-5 w-11/12 mx-auto">
                    {{-- 肉と魚 --}}
                    <p class="tracking-widest font-bold text-gray-600 text-center">肉と魚</p>
                    <ul class="slider w-10/12 mt-1">
                        @foreach ($niku_sakana as $i)
                            @php
                                // 期限日と現在日の差を計算
                                $expirationDiff = now()->diffInDays($i->expiration_date, false);
                                // 背景色を変更
                                if ($expirationDiff >= 4) {
                                    $bgColor = 'bg-lime-500';
                                } elseif ($expirationDiff >= 1) {
                                    $bgColor = 'bg-yellow-400';
                                } elseif ($expirationDiff > 0) {
                                    $bgColor = 'bg-red-500';
                                } else {
                                    $bgColor = 'bg-gray-500';
                                }
                            @endphp
                            <li><div class="hover:bg-gray-100 hover:rounded"><a href="{{ route('items.edit', $i) }}">
                                <div class="flex justify-center">
                                    <img src="{{ $i->ingredient->image }}" alt="{{ $i->ingredient->name }}" class="h-16 w-16 bg-white p-1 rounded
                                    @if($i->ingredient->category == 'niku')
                                        border-2 border-pink-100
                                    @elseif($i->ingredient->category == 'sakana')
                                        border-2 border-sky-100
                                    @endif
                                    " title="{{ $i->detail }}">
                                </div>
                                <p class="text-center rounded-lg w-10/12 mx-auto
                                @if($i->ingredient->category == 'niku')
                                    bg-pink-100
                                @elseif($i->ingredient->category == 'sakana')
                                    bg-sky-100
                                @endif
                                    ">{{ $i->ingredient->name }}</p>
                                <div class="flex justify-center">
                                    <p class="{{ $bgColor }} text-white font-bold text-sm px-2 ml-1 rounded-full" title="登録日">{{ $i->created_at->format('n/j') }}</p>
                                    <p class="text-sm ml-1">{{ $i->quantity . $i->ingredient->tanni }}
                                </div>
                            </a></div></li>
                        @endforeach
                    </ul>
                    {{-- その他 --}}
                    <p class="mt-10 tracking-widest font-bold text-gray-600 text-center">その他</p>
                    <ul class="slider w-10/12 mt-1">
                        @foreach ($other as $i)
                            @php
                                // 期限日と現在日の差を計算
                                $expirationDiff = now()->diffInDays($i->expiration_date, false);
                                // 背景色を変更
                                if ($expirationDiff >= 4) {
                                    $bgColor = 'bg-lime-500';
                                } elseif ($expirationDiff >= 1) {
                                    $bgColor = 'bg-yellow-400';
                                } elseif ($expirationDiff > 0) {
                                    $bgColor = 'bg-red-500';
                                } else {
                                    $bgColor = 'bg-gray-500';
                                }
                            @endphp
                            <li><div class="hover:bg-gray-100 hover:rounded"><a href="{{ route('items.edit', $i) }}">
                                <div class="flex justify-center">
                                    <img src="{{ $i->ingredient->image }}" alt="{{ $i->ingredient->name }}" class="h-16 w-16 bg-white p-1 rounded border-2 border-yellow-200" title="{{ $i->detail }}">
                                </div>
                                <p class="text-center rounded-lg w-10/12 mx-auto bg-yellow-100">{{ $i->ingredient->name }}</p>
                                <div class="flex justify-center">
                                    <p class="{{ $bgColor }} text-white font-bold text-sm px-2 ml-1 rounded-full" title="登録日">{{ $i->created_at->format('n/j') }}</p>
                                    <p class="text-sm ml-1">{{ $i->quantity . $i->ingredient->tanni }}
                                </div>
                            </div></li></a>
                        @endforeach
                    </ul>
                    </div>
                    <div class="border-4 rounded-lg py-10 w-11/12 mx-auto">
                    {{-- 野菜ときのこ --}}
                    <p class="tracking-widest font-bold text-gray-600 text-center">野菜ときのこ</p>
                    <ul class="slider w-10/12 mt-1">
                        @foreach ($yasai_kinoko as $i)
                            @php
                                // 期限日と現在日の差を計算
                                $expirationDiff = now()->diffInDays($i->expiration_date, false);
                                // 背景色を変更
                                if ($expirationDiff >= 4) {
                                    $bgColor = 'bg-lime-500';
                                } elseif ($expirationDiff >= 1) {
                                    $bgColor = 'bg-yellow-400';
                                } elseif ($expirationDiff > 0) {
                                    $bgColor = 'bg-red-500';
                                } else {
                                    $bgColor = 'bg-gray-500';
                                }
                            @endphp
                            <li><div class="hover:bg-gray-100 hover:rounded"><a href="{{ route('items.edit', $i) }}">
                                <div class="flex justify-center">
                                    <img src="{{ $i->ingredient->image }}" alt="{{ $i->ingredient->name }}" class="h-16 w-16 bg-white p-1 rounded
                                    @if($i->ingredient->category == 'yasai')
                                        border-2 border-lime-200
                                    @elseif($i->ingredient->category == 'kinoko')
                                        border-2 border-orange-100
                                    @endif
                                    " title="{{ $i->detail }}">
                                </div>
                                <p class="text-center rounded-lg w-10/12 mx-auto
                                @if($i->ingredient->category == 'yasai')
                                    bg-lime-200
                                @elseif($i->ingredient->category == 'kinoko')
                                    bg-orange-100
                                @endif
                                    ">{{ $i->ingredient->name }}</p>
                                    <div class="flex justify-center">
                                        <p class="{{ $bgColor }} text-white font-bold text-sm px-2 ml-1 rounded-full" title="登録日">{{ $i->created_at->format('n/j') }}</p>
                                        <p class="text-sm ml-1">{{ $i->quantity . $i->ingredient->tanni }}
                                    </div>
                            </div></li></a>
                        @endforeach
                    </ul>
                    </div>
                    <div class="border-4 rounded-lg py-7 w-11/12 mx-auto">
                    {{-- 冷凍 --}}
                    <p class="tracking-widest font-bold text-gray-600 text-center">冷凍食品</p>
                    <ul class="slider w-10/12 mt-1">
                        @foreach ($reitou as $i)
                            @php
                                // 期限日と現在日の差を計算
                                $expirationDiff = now()->diffInDays($i->expiration_date, false);
                                // 背景色を変更
                                if ($expirationDiff >= 4) {
                                    $bgColor = 'bg-lime-500';
                                } elseif ($expirationDiff >= 1) {
                                    $bgColor = 'bg-yellow-400';
                                } elseif ($expirationDiff > 0) {
                                    $bgColor = 'bg-red-500';
                                } else {
                                    $bgColor = 'bg-gray-500';
                                }
                            @endphp
                            <li><div class="hover:bg-gray-100 hover:rounded"><a href="{{ route('items.edit', $i) }}">
                                <div class="flex justify-center">
                                    <img src="{{ $i->ingredient->image }}" alt="{{ $i->ingredient->name }}" class="h-16 w-16 bg-white p-1 rounded border-2 border-purple-200" title="{{ $i->detail }}">
                                </div>
                                <p class="text-center rounded-lg w-10/12 mx-auto bg-purple-100">{{ $i->ingredient->name }}</p>
                                <div class="flex justify-center">
                                    <p class="{{ $bgColor }} text-white font-bold text-sm px-2 ml-1 rounded-full" title="登録日">{{ $i->created_at->format('n/j') }}</p>
                                    <p class="text-sm ml-1">{{ $i->quantity . $i->ingredient->tanni }}
                                </div>
                            </div></li></a>
                        @endforeach
                    </ul>
                    </div>
                </div>

                {{-- メモ --}}
                <form action="{{ route('memo.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="my-5 lg:w-6/12 mx-auto relative">
                    <img src="/images/memo.png" alt="" class="block mx-auto">
                    <textarea name="memo" id="memo" cols="30" rows="2" class="absolute resize-none top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-8/12 border-2 border-gray-200 p-2 rounded">{{ $memo->memo }}</textarea>
                    <button type="submit" class="absolute top-2/3 left-1/2 -ml-10 mt-2 bg-lime-500 hover:bg-lime-600 text-white text-lg lg:text-xl font-bold py-1 px-4 rounded-lg">保存</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/create.js"></script>
</x-app-layout>
