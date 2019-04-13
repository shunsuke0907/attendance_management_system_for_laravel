@extends('layouts.application')

@php
$headTitle = 'アカウント新規作成';
@endphp

@include('layouts.header')

@section('content')
<h1>アカウント作成</h1>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form class="new_user" id="new_user" action={{ url('signup') }} accept-charset="UTF-8" method="post">
            @csrf {{-- CSRF保護 --}}
            @method('POST') {{-- 疑似フォームメソッド --}}

            <label for="user_name">名前</label>
            <input type="text" name="user[name]" class="form-control" id="user_name" required/>

            <label for="user_email">メールアドレス</label>
            <input type="email" name="user[email]" class="form-control" id="user_email" required/>

            <label for="user_department">所属</label>
            <input type="text" name="user[department]" class="form-control" id="user_department" required/>

            <label for="user_password">パスワード</label>
            <input type="password" name="user[password]" class="form-control" id="user_password" required/>

            <label for="user_password_confirmation">パスワード（確認）</label>
            <input type="password" name="user[password_confirmation]" class="form-control" id="user_password_confirmation" required/>

            <input type="submit" name="commit" value="作成する" class="btn btn-primary" data-disable-with="作成する" />
        </form>
    </div>
</div>
@endsection
