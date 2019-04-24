@extends('layouts.application')

@php
$headTitle = 'ホーム';
@endphp

@section('content')
<div class="center jumbotron">
    <h1>勤怠管理システム</h1>

    @if (Auth::check())
        @if (isAdmin())
            @include('static_pages._admin_menu')
        @else
            @include('static_pages._user_menu')
        @endif
    @else
        <a href={{ action('UsersController@add') }} class="btn btn-lg btn-primary">アカウント作成</a>
    @endif

    <div id="clock_date"></div> {{-- 日付部分 --}}
    <div id="clock_time"></div> {{-- 時刻部分 --}}
</div>

<script type="text/javascript" src="js/clock.js"></script>
@endsection
