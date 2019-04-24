@extends('layouts.application')

@php
$headTitle = 'ユーザー情報の更新';
@endphp

@section('value_name', 'value=' . $user->name)
@section('value_email', 'value=' . $user->email)
@section('value_department', 'value=' . $user->department)
@section('button_text', '更新する')

@section('content')
<h1>ユーザー情報の更新</h1>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <form class="new_user" id="new_user" action={{ action('UsersController@update', $user) }} accept-charset="UTF-8" method="post">
            @method('PUT')

            @include('users._form')

        </form>
    </div>
</div>
@endsection
