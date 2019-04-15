@extends('layouts.application')

@php
$headTitle = 'ユーザー新規作成';
@endphp

@section('button_text', '作成する')

@section('content')
<h1>ユーザー新規作成</h1>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form class="new_user" id="new_user" action={{ url('signup') }} accept-charset="UTF-8" method="post">

            @include('users.form')

        </form>
    </div>
</div>
@endsection
