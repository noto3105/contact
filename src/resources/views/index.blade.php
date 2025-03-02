@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
                    <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
                </div>
                <div class="form__error">
                @error('last_name')
                {{ $message }}
                @enderror
                </div>
                <div class="form__error">
                @error('first_name')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <input type="radio" id="male" name="gender" placeholder="男性" value="男性"{{ old('gender') == '男性' }} checked/>
                    <label for="male">男性</label>
                </div>
                <div class="form__input--select">
                    <input type="radio" id="female" name="gender" placeholder="女性" value="女性" {{ old('gender') == '女性' }} />
                    <label for="female">女性</label>
                </div>
                <div class="form__input--select">
                    <input type="radio" id="other" name="gender" placeholder="その他" value="その他"{{ old('gender') == 'その他' }} />
                    <label for="othor">その他</label>
                </div>
                <div class="form__error">
                @error('gender')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input type="tel" name="tel1" placeholder="090" value="{{ old('tel1') }}" />
                    <span>-</span>
                    <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                    <span>-</span>
                    <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
                </div>
                <div class="form__error">
                @error('tel')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
                <div class="form__error">
                @error('building')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select name="category" id="category" value="{{ old('category') }}">
                        <option value="選択してください">選択してください</option>
                        <option value="商品のお届けについて">商品のお届けについて</option>
                        <option value="商品の交換について">商品の交換について</option>
                        <option value="商品トラブル">商品トラブル</option>
                        <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="form__error">
                @error('category')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection