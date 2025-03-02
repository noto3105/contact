<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('assets/css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<main>
        <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            <form class="header__nav" action="/logout" method="post">
                @csrf
            <button class="header__nav-button">logout</button>
            </form>
        </div>
    </header>
    <body>
        <div class="Admin__content">
            <div class="Admin-form__heading">
                <h2>Admin</h2>
            </div>
            <form class="search-form" action="/admin/search" method="get">
                @csrf
                <input class="search-form__item-input" type="text" name="keyword"  value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください">
                <select class="search-form__item-gender" name="gender" placeholder="性別">
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="その他">その他</option>
                <select class="search-form__item--category" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($contacts as $contact)
                    <option value="{{ $contact['id'] }}">{{ $contact['name'] }}</option>
                    @endforeach
                </select>
                <input class="search-form__item--date" type="date">
                <input class="search-form__item--reset" type="submit"  value="検索">
            </form>
            <table class="contact-list" border="1">
                <tr class="contact-list__title">
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
                @foreach ($contacts as $contact)
                <tr>
                    <td class="contact-list__item">{{ $contact->last_name }} {{$contact->first_name}}</td>
                    <td class="contact-list__item">{{ $contact->gender }}</td>
                    <td class="contact-list__item">{{ $contact->email }}</td>
                    <td class="contact-list__item">{{ $contact->category_id }}</td>
                    <td>
                        <button class="contact-list__detail" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{ $contact->id }}">
                            詳細
                        </button>
                        <div class="modal" id="modal-{{ $contact->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-body">
                                    <a href="/admin">⊗</a>
                                        <div class="modal-body__item">
                                            <p>お名前</p>
                                            <p>{{ $contact->last_name }} {{ $contact->first_name }}</p>
                                        </div>
                                        <div class="modal-body__item">⊗
                                            <p>性別</p>
                                            <p>{{ $contact->gender }}</p>
                                        </div>
                                        <div class="modal-body__item">
                                            <p>メールアドレス</p>
                                            <p>{{ $contact->email }}</p>
                                        </div>
                                        <div class="modal-body__item">
                                            <p>電話番号</p>
                                            <p>{{ $contact->phone }}</p>
                                        </div>
                                        <div class="modal-body__item">
                                            <p>住所</p>
                                            <p>{{ $contact->address }}</p>
                                        </div>
                                        <div class="modal-body__item">
                                            <p>建物名</p>
                                            <p>{{ $contact->building }}</p>
                                        </div>
                                        <div class="modal-body__item">
                                            <p>お問い合わせの種類</p>
                                            <p>{{ $contact->category_id }}</p>
                                        </div>
                                        <div class="modal-body__item">
                                            <p>お問い合わせ内容</p>
                                            <p>{{ $contact->detail }}</p>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button clas="delete-btn type="button" >削除</button>
                                </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</main>