@extends('layouts.application')

@php
$headTitle = '勤怠表示';
@endphp

@section('content')
<div>
    <table class = "table-bordered table-condensed">
        @include('users._user_info')
    </table>

    @if ($user->position === 1)
        <div>
            <div class="margin">
                <a class="red" id="attendance" data-remote="true" href="#">【所属長承認申請のお知らせ】</a>
                <span class="red2 box">###件の申請があります</span>
            </div>

            <div class="">【勤怠変更のお知らせ】</div>

            <div class="margin">
                <a class="red" id="overtime" data-remote="true" href="#">【残業申請のお知らせ】</a>
                <span class="red2 box">###件の申請があります</span>
            </div>
        </div>
    @endif

    <a href="#" class="btn btn-primary">勤怠を編集</a>
    <a href="#" class="btn btn-primary">CSV出力</a>
    <a href="#" class="btn btn-primary">勤怠修正ログ（承認済）</a>

    <table class = "table-bordered table-striped table-condensed">
        @include('users._attendance_list')
    </table>
</div>
@endsection
