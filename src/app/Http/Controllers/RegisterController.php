<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Product;
use App\Models\Season;

class RegisterController extends Controller
{
    public function register()

    {
        return view('register');
    }

    public function store(RegisterRequest $request)

    {
        $productData = $request->only(['name', 'price', 'description']);
        // POSTで送られたデータを取得
        if ($request->hasFile('image')) {
            // 画像を storage/app/public/productsに保存し、パスを取得
            $path = $request->file('image')->store('products', 'public');

            // 画像パスをデータに追加
            $productData['image'] = $path;
        }
        $product = Product::create($productData);
        // データを保存
        $selectedSeasons = $request->input('season', []);
        $seasonIds = Season::whereIn('name', (array) $selectedSeasons)->pluck('id')->toArray();
        $product->seasons()->sync($seasonIds);
        // 中間テーブルに`product_id` と `season_id` を保存
        return redirect()->route('index');
    }

    public function back()

    {
        return redirect()->route('index');
    }
}
