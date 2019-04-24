@extends('layouts.application')

@php
$headTitle = 'ログイン';
@endphp

@section('content')
<h1>ログイン</h1>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action={{ url('login') }} accept-charset="UTF-8" method="post">
            @csrf {{-- CSRF保護 --}}
            @method('POST') {{-- 疑似フォームメソッド --}}

            <label for="session_email">メールアドレス</label>
            <input type="email" name="session[email]" id="session_email" class="form-control" required>

            <label for="session_password">パスワード</label>
            <input type="password" name="session[password]" id="session_password" class="form-control" required>

            <input type="hidden" name="requestUrl" value="{{ $url }}">

            <input type="submit" name="commit" value="ログインする" class="btn btn-primary" data-disable-with="ログインする">
        </form>
        <p>ユーザー登録がまだの場合は<a href={{ action('UsersController@add') }}>こちらから</a>登録</p>
    </div>
</div>
@endsection
