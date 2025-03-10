@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="form">
    <form class="update-form" action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="product-detail">
            <div class="product-form__heading">
                <a href="{{ route('index') }}" class="product__link">商品一覧</a>
                <span class="product__current">{{ $product->name }}</span>
            </div>
            <div class="product-form__item">
                <div class="product-form__img">
                    <div class=" product-form__img-input">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="create-form__item-file">
                            <input type="file" name="image" accept="image/png,image/jpeg" />
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                        </div>
                        <div class="form__error">
                            @error('image')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="create-form__content">
                    <div class="form-group">
                        <label for="name">商品名</label>
                        <input type="text" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                        <div class="form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">値段</label>
                        <input type="text" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                        <div class="form__error">
                            @error('price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>季節</label>
                        <div class="season-checkbox">
                            @foreach (['春', '夏', '秋', '冬'] as $season)
                            <label>
                                <input type="checkbox" name="season[]" value="{{ $season }}"
                                    {{ $product->seasons->contains('name', $season) ? 'checked' : '' }}>
                                {{ $season }}
                            </label>
                            @endforeach
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                        </div>
                        <div class="form__error">
                            @error('season')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-description">
            <label for="name">商品説明</label>
            <textarea name="description" rows="5">{{ $product->description }}</textarea>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="product-button">
            <a class="product-button__back" href="{{ route('index') }}">商品一覧に戻る</a>

            <div class="update-form__item">
                <button class="product-button__update" type="submit">変更を保存</button>
            </div>
    </form>
    <form class="delete-form" action="/products/{{ $product->id }}/delete" method="POST">
        @method('DELETE')
        @csrf
        <div class="delete-form__button">
            <input type="hidden" name="id" value="{{ $product['id'] }}">
            <button class="product-button__delete" type="submit">🗑️</button>
        </div>
    </form>
</div>


@endsection