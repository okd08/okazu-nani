<x-app-layout>
  @section('title', 'こうしん')
  <x-slot name="header">
      <h2 class="font-semibold text-lg text-gray-600 leading-tight">
          食材のこうしん
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="my-5 w-10/12 mx-auto">

        <form action="{{ route('items.update', $item) }}" method="POST">
          @csrf
          @method('PATCH')
          {{-- 食材 --}}
          <p class="text-lg lg:text-2xl mb-2">・食材</p>
          <div class="w-4/12 lg:w-3/12 ml-2 mb-10">
            <img src="{{ $item->ingredient->image }}" alt="{{ $item->ingredient->name }}" class="border-4 border-lime-400 rounded-xl">
            <p class="text-center p-1 bg-lime-400 rounded-full font-bold text-white text-lg">{{ $item->ingredient->name }}</p>
          </div>

          {{-- 数量 --}}
          <p class="text-lg lg:text-2xl mb-2">・数量</p>
          {{-- バリデーションメッセージ --}}
          @if ($errors->has('quantity'))
            <span class="text-red-500">{{ $errors->first('quantity') }}</span>
          @endif
          <div class="flex">
            <select name="quantity" id="quantity" class="w-5/12 lg:w-2/12 ml-2 lg:ml-16 mb-10 py-1 pl-3 rounded">
              <option value="" disabled>選択してください</option>
              <option value="1/4" {{ ($item->quantity ?? null) == '1/4' ? 'selected' : '' }}>1/4</option>
              <option value="1/3" {{ ($item->quantity ?? null) == '1/3' ? 'selected' : '' }}>1/3</option>
              <option value="1/2" {{ ($item->quantity ?? null) == '1/2' ? 'selected' : '' }}>1/2</option>
              <option value="1" {{ ($item->quantity ?? null) == '1' ? 'selected' : '' }}>1</option>
              <option value="1.5" {{ ($item->quantity ?? null) == '1.5' ? 'selected' : '' }}>1.5</option>
              <option value="2" {{ ($item->quantity ?? null) == '2' ? 'selected' : '' }}>2</option>
              <option value="2.5" {{ ($item->quantity ?? null) == '2.5' ? 'selected' : '' }}>2.5</option>
              <option value="3" {{ ($item->quantity ?? null) == '3' ? 'selected' : '' }}>3</option>
              <option value="4" {{ ($item->quantity ?? null) == '4' ? 'selected' : '' }}>4</option>
              <option value="5" {{ ($item->quantity ?? null) == '5' ? 'selected' : '' }}>5</option>
              <option value="6" {{ ($item->quantity ?? null) == '6' ? 'selected' : '' }}>6</option>
              <option value="7" {{ ($item->quantity ?? null) == '7' ? 'selected' : '' }}>7</option>
              <option value="8" {{ ($item->quantity ?? null) == '8' ? 'selected' : '' }}>8</option>
              <option value="9" {{ ($item->quantity ?? null) == '9' ? 'selected' : '' }}>9</option>
              <option value="その他" {{ ($item->quantity ?? null) == 'その他' ? 'selected' : '' }}>その他</option>
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
              <option value="1" {{ ($item->kigen ?? null) == '1' ? 'selected' : '' }}>1</option>
              <option value="2" {{ ($item->kigen ?? null) == '2' ? 'selected' : '' }}>2</option>
              <option value="3" {{ ($item->kigen ?? null) == '3' ? 'selected' : '' }}>3</option>
              <option value="4" {{ ($item->kigen ?? null) == '4' ? 'selected' : '' }}>4</option>
              <option value="5" {{ ($item->kigen ?? null) == '5' ? 'selected' : '' }}>5</option>
              <option value="6" {{ ($item->kigen ?? null) == '6' ? 'selected' : '' }}>6</option>
              <option value="7" {{ ($item->kigen ?? null) == '7' ? 'selected' : '' }}>7</option>
              <option value="8" {{ ($item->kigen ?? null) == '8' ? 'selected' : '' }}>8</option>
              <option value="9" {{ ($item->kigen ?? null) == '9' ? 'selected' : '' }}>9</option>
              <option value="10" {{ ($item->kigen ?? null) == '10' ? 'selected' : '' }}>10</option>
              <option value="11" {{ ($item->kigen ?? null) == '11' ? 'selected' : '' }}>11</option>
              <option value="12" {{ ($item->kigen ?? null) == '12' ? 'selected' : '' }}>12</option>
              <option value="13" {{ ($item->kigen ?? null) == '13' ? 'selected' : '' }}>13</option>
              <option value="14" {{ ($item->kigen ?? null) == '14' ? 'selected' : '' }}>14</option>
              <option value="15" {{ ($item->kigen ?? null) == '15' ? 'selected' : '' }}>15</option>
              <option value="16" {{ ($item->kigen ?? null) == '16' ? 'selected' : '' }}>16</option>
              <option value="17" {{ ($item->kigen ?? null) == '17' ? 'selected' : '' }}>17</option>
              <option value="18" {{ ($item->kigen ?? null) == '18' ? 'selected' : '' }}>18</option>
              <option value="19" {{ ($item->kigen ?? null) == '19' ? 'selected' : '' }}>19</option>
              <option value="20" {{ ($item->kigen ?? null) == '20' ? 'selected' : '' }}>20</option>
              <option value="21" {{ ($item->kigen ?? null) == '21' ? 'selected' : '' }}>21</option>
            </select>
            <p class="ml-2 mt-1">日</p>
          </div>

          {{-- 詳細 --}}
          <p class="text-lg lg:text-2xl mb-2">・詳細</p>
          {{-- バリデーションメッセージ --}}
          @if ($errors->has('detail'))
            <span class="text-red-500">{{ $errors->first('detail') }}</span>
          @endif
          <textarea name="detail" id="detail" rows="3" placeholder="その他を選択した場合の食材名や数量、特記事項などを登録できます"  class="resize-none ml-2 lg:ml-16 p-3 w-10/12 lg:w-8/12 rounded">{{ $item->detail }}</textarea>

          {{-- 登録ボタン --}}
          <div class="text-center">
            <button type="submit" class="bg-lime-500 hover:bg-lime-600 text-white text-xl lg:text-2xl font-bold tracking-wider py-2 px-4 rounded-lg mt-10">こうしん</button>
          </div>
        </form>

        {{-- シール削除ボタン --}}
        <form action="{{ route('items.destroy', $item) }}" method="POST" class="pb-20 text-center mt-5">
          @csrf
          @method('DELETE')
          <button id="delete" type="submit" class="bg-red-500 hover:bg-red-600 text-xl lg:text-2xl text-white font-bold py-2 px-4 rounded-lg">ごちそうさま(削除)</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="/js/create.js"></script>
</x-app-layout>