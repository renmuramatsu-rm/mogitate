@extends('layouts.app')
<style>
    svg.w-5.h-5 {
        /*paginateメソッドの矢印の大きさ調整のために追加*/
        width: 30px;
        height: 30px;
    }
</style>
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="product-form">
    <div class="product-form__heading">
        <h2>商品一覧</h2>
        <div class="add__button">
            <a href="{{ route('products.register') }}" class="add__button-submit">+ 商品を追加</a>
        </div>
    </div>
    <div class="form">
        <div class="form-content">
            <form class="form-search" action="/products/search" method="get">
                <div class="form__group">
                    <div class="search-form">
                        <div class="search-form__item">
                            <input class="search-form__item-input" type="text" name="keyword" placeholder="商品名で検索">
                        </div>
                        <div class="search-form__button">
                            <button class="search__button-submit" type="submit">検索</button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="GET" action="{{ route('index') }}">
                <div class="sort-form">
                    <div class="sort-form__title">
                        <h3>価格順で表示</h3>
                    </div>
                    <div class="sort-form__button">
                        <select class="sort-form__item-select" name="sort" onchange="this.form.submit()">
                            <option value="asc" {{ ($sort ?? 'asc') == 'asc' ? 'selected' : '' }}>低い順に表示</option>
                            <option value="desc" {{ ($sort ?? 'asc') == 'desc' ? 'selected' : '' }}>高い順に表示</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="form__group-product">
            @foreach ($products as $product)
            <div class="product-form__list">
                <a href="{{ route('show', $product->id) }}">
                    <img class="product-form__img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                </a>
                <p class="product-form__name">{{ $product->name }}</p>
                <p class="product-form__price">{{ $product->price }}</p>
            </div>
            @endforeach
            <div class="pagination">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection