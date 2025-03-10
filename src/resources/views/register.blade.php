@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>商品登録</h2>
    </div>
    <form class="form" action="/products/register" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品名</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">値段</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="number" name="price" placeholder="値段を入力" value="{{ old('price') }}" />
                </div>
                <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品画像</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="file" name="image" accept="image/png,image/jpeg" />
                </div>
                <div class="form__error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">季節
                </span>
                <span class="form__label--required">必須</span>
                <span class="form__label--multi">複数選択可</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <ul class="form__list">
                        <li class="form__list-inner">
                            <input type="checkbox" name="season[]" value="春" {{ old('season') == '春' ? 'checked' : '' }}>
                            <label for="spring">春</label>
                        </li>
                        <li class="form__list-inner">
                            <input type="checkbox" name="season[]" value="夏" {{ old('season') == '夏' ? 'checked' : '' }}>
                            <label for="summer">夏</label>
                        </li>
                        <li class="form__list-inner">
                            <input type="checkbox" name="season[]" value="秋" {{ old('season') == '秋' ? 'checked' : '' }}>
                            <label for="autumn">秋</label>
                        </li>
                        <li class="form__list-inner">
                            <input type="checkbox" name="season[]" value="冬" {{ old('season') == '冬' ? 'checked' : '' }}>
                            <label for="winter">冬</label>
                        </li>
                </div>
            </div>
            <div class="form__error">
                @error('season')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品説明</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="description" rows="5" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-back" type="submit" name="back" formaction="{{ route('back') }}" formmethod="GET">戻る</button>
            <button class="form__button-submit" type="submit" name="submit" formaction="/products/register">登録</button>
        </div>
    </form>
</div>





@endsection