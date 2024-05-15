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
     * アイテム表示とメモ表示
     */
    public function index()
    {
        // ログインユーザーのidを取得
        $userId = Auth::id();

        // ログインユーザーのメモを取得
        $memo = Memo::where('user_id', $userId)->first();

        // 今日の日付を取得
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

        return view('dashboard', compact('niku_sakana', 'other', 'yasai_kinoko', 'reitou', 'memo'));
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

        // post値を取得しDBを更新
        $memo->memo = $request->input('memo');
        $memo->save();

        return redirect()->route('items.index');
    }

    /**
     * アイテム登録画面
     */
    public function create()
    {
        // 全ての食材を取得
        $ingredients = Ingredient::all();

        // 食材をカテゴリ―ごとに取得
        $niku = $ingredients->where('category', 'niku')->all();
        $sakana = $ingredients->where('category', 'sakana')->all();
        $yasai = $ingredients->where('category', 'yasai')->all();
        $kinoko = $ingredients->where('category', 'kinoko')->all();
        $other = $ingredients->where('category', 'other')->all();
        $reitou = $ingredients->where('category', 'reitou')->all();

        return view('create', compact('niku', 'sakana', 'yasai', 'kinoko', 'other', 'reitou'));
    }

    /**
     * アイテム登録
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'ingredient_id' => 'required',
            'quantity' => 'required',
            'kigen' => 'required',
        ]);
    
        // バリデーションに失敗した場合
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // post値を取得
        $posts = $request->all();

        // 現在の日付に日数を加算して賞味期限を計算
        $expiration_date = now()->addDays(intval($posts['kigen']));

        // DBに保存
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
     * アイテム編集画面
     */
    public function edit(string $id)
    {
        // アイテムを取得
        $item = Item::with('ingredient')
            ->where('items.id', $id)
            ->first();

        return view('edit', compact('item'));
    }

    /**
     * アイテム更新
     */
    public function update(Request $request, string $id)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'quantity' => 'required',
            'kigen' => 'required',
        ]);

        // バリデーションに失敗した場合
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // アイテムを取得
        $item = Item::findOrFail($id);

        // 登録日に日数を加算して賞味期限を計算
        $expiration_date = $item->created_at->addDays(intval($request->input('kigen')));

        // DBを更新
        $item->quantity = $request->input('quantity');
        $item->kigen = $request->input('kigen');
        $item->detail = $request->input('detail');
        $item->expiration_date = $expiration_date;
        $item->save();

        // 更新成功メッセージをセッションに保存
        session()->flash('success', '食材を更新しました。');

        return redirect()->route('items.index');
    }

    /**
     * アイテム削除
     */
    public function destroy(string $id)
    {
        // アイテムを取得し削除
        Item::where('id', $id)->delete();

        // 削除成功メッセージをセッションに保存
        session()->flash('success', '食材を削除しました。');

        return redirect()->route('items.index');
    }
}
