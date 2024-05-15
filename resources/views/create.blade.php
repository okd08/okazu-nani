<x-app-layout>
  @section('title', 'とうろく')
  <x-slot name="header">
    <h2 class="font-semibold text-lg text-gray-600 leading-tight">
      食材のとうろく
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
        <div class="my-5 w-10/12 mx-auto">

        <form action="{{ route('items.store') }}" method="POST">
          @csrf
          {{-- 食材 --}}
          <p class="text-lg lg:text-2xl mb-2">・食材</p>
          {{-- バリデーションメッセージ --}}
          @if ($errors->has('ingredient_id'))
            <span class="text-red-500">{{ $errors->first('ingredient_id') }}</span>
          @endif
          <ul class="accordion-area mb-8">
            {{-- 肉 --}}
            <li>
              {{-- ヘッダー --}}
              <div class="title flex items-center border-b-2 bg-pink-100 text-gray-700 rounded px-2 py-2">
                <img src="/images/meat/gyu_steak.png" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white">
                <h3 class="font-bold ml-2 lg:text-xl">肉</h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8 ml-auto">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
              </div>
              {{-- 一覧 --}}
              <div class="box flex flex-wrap">
                @foreach ($niku as $n)
                  <div class="w-1/3 lg:w-1/5 p-2">
                    <div onclick="document.getElementById('ingredient_id').value = '{{ $n->id }}'" class="selectable-item hover:ring rounded">
                      <img src="{{ $n->image }}" alt="{{ $n->name }}" class="bg-white h-20 w-28 lg:h-32 lg:w-48 rounded-t-lg">
                      <p class="text-center bg-pink-100 rounded-b-lg py-1">{{ $n->name }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </li>
            {{-- 魚 --}}
            <li>
              <div class="title flex items-center border-b-2 bg-sky-100 text-gray-700 rounded px-2 py-2">
                <img src="/images/fish/kirimi.png" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white">
                <h3 class="font-bold ml-2 lg:text-xl">魚</h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8 ml-auto">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
              </div>
              <div class="box flex flex-wrap">
                @foreach ($sakana as $n)
                  <div class="w-1/3 lg:w-1/5 p-2">
                    <div onclick="document.getElementById('ingredient_id').value = '{{ $n->id }}'" class="selectable-item hover:ring rounded">
                      <img src="{{ $n->image }}" alt="{{ $n->name }}" class="bg-white h-20 w-28 lg:h-32 lg:w-48 rounded-t-lg">
                      <p class="text-center bg-sky-100 rounded-b-lg py-1">{{ $n->name }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </li>
            {{-- 野菜 --}}
            <li>
              <div class="title flex items-center border-b-2 bg-lime-100 text-gray-700 rounded px-2 py-2">
                <img src="/images/vegetable/cabbage.png" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white">
                <h3 class="font-bold ml-2 lg:text-xl">野菜</h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8 ml-auto">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
              </div>
              <div class="box flex flex-wrap">
                @foreach ($yasai as $n)
                  <div class="w-1/3 lg:w-1/5 p-2">
                    <div onclick="document.getElementById('ingredient_id').value = '{{ $n->id }}'" class="selectable-item hover:ring rounded">
                      <img src="{{ $n->image }}" alt="{{ $n->name }}" class="bg-white h-20 w-28 lg:h-32 lg:w-48 rounded-t-lg">
                      <p class="text-center bg-lime-100 rounded-b-lg py-1">{{ $n->name }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </li>
            {{-- きのこ --}}
            <li>
              <div class="title flex items-center border-b-2 bg-orange-100 text-gray-700 rounded px-2 py-2">
                <img src="/images/kinoko/eringi.png" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white">
                <h3 class="font-bold ml-2 lg:text-xl">きのこ</h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8 ml-auto">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
              </div>
              <div class="box flex flex-wrap">
                @foreach ($kinoko as $n)
                  <div class="w-1/3 lg:w-1/5 p-2">
                    <div onclick="document.getElementById('ingredient_id').value = '{{ $n->id }}'" class="selectable-item hover:ring rounded">
                      <img src="{{ $n->image }}" alt="{{ $n->name }}" class="bg-white h-20 w-28 lg:h-32 lg:w-48 rounded-t-lg">
                      <p class="text-center bg-orange-100 rounded-b-lg py-1">{{ $n->name }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </li>
            {{-- その他 --}}
            <li>
              <div class="title flex items-center border-b-2 bg-yellow-100 text-gray-700 rounded px-2 py-2">
                <img src="/images/other/milk.png" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white">
                <h3 class="font-bold ml-2 lg:text-xl">その他</h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8 ml-auto">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
              </div>
              <div class="box flex flex-wrap">
                @foreach ($other as $n)
                  <div class="w-1/3 lg:w-1/5 p-2">
                    <div onclick="document.getElementById('ingredient_id').value = '{{ $n->id }}'" class="selectable-item hover:ring rounded">
                      <img src="{{ $n->image }}" alt="{{ $n->name }}" class="bg-white h-20 w-28 lg:h-32 lg:w-48 rounded-t-lg">
                      <p class="text-center bg-yellow-100 rounded-b-lg py-1">{{ $n->name }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </li>
            {{-- 冷凍食品 --}}
            <li>
              <div class="title flex items-center border-b-2 bg-purple-100 text-gray-700 rounded px-2 py-2">
                <img src="/images/reitou/souzai.png" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white">
                <h3 class="font-bold ml-2 lg:text-xl">冷凍食品</h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8 ml-auto">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
              </div>
              <div class="box flex flex-wrap">
                @foreach ($reitou as $n)
                  <div class="w-1/3 lg:w-1/5 p-2">
                    <div onclick="document.getElementById('ingredient_id').value = '{{ $n->id }}'" class="selectable-item hover:ring rounded">
                      <img src="{{ $n->image }}" alt="{{ $n->name }}" class="bg-white h-20 w-28 lg:h-32 lg:w-48 rounded-t-lg">
                      <p class="text-center bg-purple-100 rounded-b-lg py-1">{{ $n->name }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </li>
          </ul>
          <input type="hidden" name="ingredient_id" id="ingredient_id" value="{{ old('ingredient_id') }}">

          {{-- 数量 --}}
          <p class="text-lg lg:text-2xl mb-2">・数量</p>
          {{-- バリデーションメッセージ --}}
          @if ($errors->has('quantity'))
            <span class="text-red-500">{{ $errors->first('quantity') }}</span>
          @endif
          <div class="flex">
            <select name="quantity" id="quantity" class="w-5/12 lg:w-2/12 ml-2 lg:ml-16 mb-10 py-1 pl-3 rounded">
              <option value="" selected disabled>選択してください</option>
              <option value="1/4" {{ (old('quantity') ?? null) == '1/4' ? 'selected' : '' }}>1/4</option>
              <option value="1/3" {{ (old('quantity') ?? null) == '1/3' ? 'selected' : '' }}>1/3</option>
              <option value="1/2" {{ (old('quantity') ?? null) == '1/2' ? 'selected' : '' }}>1/2</option>
              <option value="1" {{ (old('quantity') ?? null) == '1' ? 'selected' : '' }}>1</option>
              <option value="1.5" {{ (old('quantity') ?? null) == '1.5' ? 'selected' : '' }}>1.5</option>
              <option value="2" {{ (old('quantity') ?? null) == '2' ? 'selected' : '' }}>2</option>
              <option value="2.5" {{ (old('quantity') ?? null) == '2.5' ? 'selected' : '' }}>2.5</option>
              <option value="3" {{ (old('quantity') ?? null) == '3' ? 'selected' : '' }}>3</option>
              <option value="4" {{ (old('quantity') ?? null) == '4' ? 'selected' : '' }}>4</option>
              <option value="5" {{ (old('quantity') ?? null) == '5' ? 'selected' : '' }}>5</option>
              <option value="6" {{ (old('quantity') ?? null) == '6' ? 'selected' : '' }}>6</option>
              <option value="7" {{ (old('quantity') ?? null) == '7' ? 'selected' : '' }}>7</option>
              <option value="8" {{ (old('quantity') ?? null) == '8' ? 'selected' : '' }}>8</option>
              <option value="9" {{ (old('quantity') ?? null) == '9' ? 'selected' : '' }}>9</option>
              <option value="その他" {{ (old('quantity') ?? null) == 'その他' ? 'selected' : '' }}>その他</option>
            </select>
            <p class="ml-2 mt-1">個/本/枚/袋/パックなど</p>
          </div>

          {{-- 賞味期限 --}}
          <p class="text-lg lg:text-2xl mb-2">・賞味期限</p>
          {{-- バリデーションメッセージ --}}
          @if ($errors->has('kigen'))
            <span class="text-red-500">{{ $errors->first('kigen') }}</span>
          @endif
          <div class="flex">
            <select name="kigen" id="kigen" class="w-5/12 lg:w-2/12 ml-2 lg:ml-16 mb-10 py-1 pl-3 rounded">
              <option value="" selected disabled>選択してください</option>
              <option value="1" {{ (old('kigen') ?? null) == '1' ? 'selected' : '' }}>1</option>
              <option value="2" {{ (old('kigen') ?? null) == '2' ? 'selected' : '' }}>2</option>
              <option value="3" {{ (old('kigen') ?? null) == '3' ? 'selected' : '' }}>3</option>
              <option value="4" {{ (old('kigen') ?? null) == '4' ? 'selected' : '' }}>4</option>
              <option value="5" {{ (old('kigen') ?? null) == '5' ? 'selected' : '' }}>5</option>
              <option value="6" {{ (old('kigen') ?? null) == '6' ? 'selected' : '' }}>6</option>
              <option value="7" {{ (old('kigen') ?? null) == '7' ? 'selected' : '' }}>7</option>
              <option value="8" {{ (old('kigen') ?? null) == '8' ? 'selected' : '' }}>8</option>
              <option value="9" {{ (old('kigen') ?? null) == '9' ? 'selected' : '' }}>9</option>
              <option value="10" {{ (old('kigen') ?? null) == '10' ? 'selected' : '' }}>10</option>
              <option value="11" {{ (old('kigen') ?? null) == '11' ? 'selected' : '' }}>11</option>
              <option value="12" {{ (old('kigen') ?? null) == '12' ? 'selected' : '' }}>12</option>
              <option value="13" {{ (old('kigen') ?? null) == '13' ? 'selected' : '' }}>13</option>
              <option value="14" {{ (old('kigen') ?? null) == '14' ? 'selected' : '' }}>14</option>
              <option value="15" {{ (old('kigen') ?? null) == '15' ? 'selected' : '' }}>15</option>
              <option value="16" {{ (old('kigen') ?? null) == '16' ? 'selected' : '' }}>16</option>
              <option value="17" {{ (old('kigen') ?? null) == '17' ? 'selected' : '' }}>17</option>
              <option value="18" {{ (old('kigen') ?? null) == '18' ? 'selected' : '' }}>18</option>
              <option value="19" {{ (old('kigen') ?? null) == '19' ? 'selected' : '' }}>19</option>
              <option value="20" {{ (old('kigen') ?? null) == '20' ? 'selected' : '' }}>20</option>
              <option value="21" {{ (old('kigen') ?? null) == '21' ? 'selected' : '' }}>21</option>
            </select>
            <p class="ml-2 mt-1">日</p>
          </div>

          {{-- 詳細 --}}
          <p class="text-lg lg:text-2xl mb-2">・詳細</p>
          {{-- バリデーションメッセージ --}}
          @if ($errors->has('detail'))
            <span class="text-red-500">{{ $errors->first('detail') }}</span>
          @endif
          <textarea name="detail" id="detail" rows="3" placeholder="その他を選択した場合の食材名や数量、特記事項などを登録できます"  class="resize-none ml-2 lg:ml-16 p-3 w-10/12 lg:w-8/12 rounded">{{ old('detail') }}</textarea>

          {{-- 登録ボタン --}}
          <div class="text-center">
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white text-xl lg:text-3xl font-bold tracking-wider py-2 px-4 rounded-lg mt-10">とうろく</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="/js/create.js"></script>
</x-app-layout>