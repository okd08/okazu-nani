<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Ingredient;
use App\Models\Item;
use App\Models\Memo;

class ItemController extends Controller
{
    /**
     * アイテムとメモ表示/編集
     */
    public function index()
    {
        // ログインユーザーのidを取得
        $userId = Auth::id();

        // $items = Item::where('user_id', $userId)->all();
        $today = now();

        // 肉と魚
        $niku_sakana = Item::where('user_id', $userId)
            ->whereHas('ingredient', function ($query) {
                $query->where('category', 'niku')
                    ->orWhere('category', 'sakana');
            })
            ->with('ingredient')
            ->orderBy('expiration_date')
            ->get();
        // その他
        $other = Item::where('user_id', $userId)
            ->whereHas('ingredient', function ($query) {
                $query->where('category', 'other');
            })
            ->with('ingredient')
            ->orderBy('expiration_date')
            ->get();
        // 野菜ときのこ
        $yasai_kinoko = Item::where('user_id', $userId)
            ->whereHas('ingredient', function ($query) {
                $query->where('category', 'yasai')
                    ->orWhere('category', 'kinoko');
            })
            ->with('ingredient')
            ->orderBy('expiration_date')
            ->get();
        // 冷凍
        $reitou = Item::where('user_id', $userId)
            ->whereHas('ingredient', function ($query) {
                $query->where('category', 'reitou');
            })
            ->with('ingredient')
            ->orderBy('expiration_date')
            ->get();

        // ログインユーザーのメモを取得
        $memo = Memo::where('user_id', $userId)->first();

        return view('dashboard', compact('niku_sakana', 'other', 'yasai_kinoko', 'reitou', 'memo'));
    }

    /**
     * 食材登録画面
     */
    public function create()
    {
        $ingredients = Ingredient::all();

        $niku = $ingredients->where('category', 'niku')->all();
        $sakana = $ingredients->where('category', 'sakana')->all();
        $yasai = $ingredients->where('category', 'yasai')->all();
        $kinoko = $ingredients->where('category', 'kinoko')->all();
        $other = $ingredients->where('category', 'other')->all();
        $reitou = $ingredients->where('category', 'reitou')->all();

        return view('create', compact('ingredients', 'niku', 'sakana', 'yasai', 'kinoko', 'other', 'reitou'));
    }

    /**
     * 食材登録
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ingredient_id' => 'required',
            'quantity' => 'required',
            'kigen' => 'required',
        ]);
    
        // バリデーションに失敗した場合
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $posts = $request->all();

        // 現在の日付に日数を加算して期限を計算
        $expiration_date = now()->addDays(intval($posts['kigen']));
    
        Item::insert([
            'user_id' => Auth::id(),
            'ingredient_id' => $posts['ingredient_id'],
            'quantity' => $posts['quantity'],
            'kigen' => $posts['kigen'],
            'detail' => $posts['detail'],
            'expiration_date' => $expiration_date,
        ]);
    
        // 登録成功メッセージをセッションに保存
        session()->flash('success', '食材をとうろくしました。');
    
        return redirect()->route('items.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * 食材編集画面
     */
    public function edit(string $id)
    {
        $item = Item::with('ingredient')
            ->where('items.id', $id)
            ->first();

        $ingredients = Ingredient::all();

        return view('edit', compact('item', 'ingredients'));
    }

    /**
     * 食材更新
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required',
            'kigen' => 'required|integer', // kigenは整数であることを確認するバリデーションを追加
        ]);

        // バリデーションに失敗した場合
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = Item::findOrFail($id); // IDに対応するアイテムを見つける

        // 現在の日付に日数を加算して期限を計算
        $expiration_date = now()->addDays(intval($request->input('kigen')));

        // レコードを更新する
        $item->quantity = $request->input('quantity');
        $item->kigen = $request->input('kigen');
        $item->detail = $request->input('detail');
        $item->expiration_date = $expiration_date;
        $item->save();

        // 成功メッセージをセッションに保存
        session()->flash('success', '食材を更新しました。');

        return redirect()->route('items.index');
    }

    /**
     * メモ更新
     */
    public function update_memo(Request $request)
    {
        // ログインユーザーのIDを取得
        $userId = Auth::id();

        // ログインユーザーのメモを取得
        $memo = Memo::where('user_id', $userId)->first();

        $memo->memo = $request->input('memo');
        $memo->save();

        return redirect()->route('items.index');
    }

    /**
     * 食材削除
     */
    public function destroy(string $id)
    {
        Item::where('id', $id)->delete();

        // 成功メッセージをセッションに保存
        session()->flash('success', '食材を削除しました。');

        return redirect()->route('items.index');
    }
}
