@extends('layouts.application')

@php
$headTitle = 'ホーム';
@endphp

@section('content')
<div class="center jumbotron">
    <h1>勤怠管理システム</h1>
    <a href={{ action('UsersController@add') }} class="btn btn-lg btn-primary">アカウント作成</a>

    <div id="clock_date"></div> {{-- 日付部分 --}}
    <div id="clock_time"></div> {{-- 時刻部分 --}}
</div>

<script type="text/javascript" src="js/clock.js"></script>
@endsection
