@extends('layouts.application')

@php
$headTitle = '勤怠表示';
@endphp

@section('content')
<div>
    <table class = "table-bordered table-condensed">
        <tr>
            <td>
                &emsp;#年#月　時間管理表&emsp;
            </td>
            <td>
                指定勤務開始時間：<br>
                指定勤務終了時間：
            </td>
            <td colspan = "2">基本時間：{{ $user->basic_time }}</td>
            <td>初日：</td>
        </tr>
        <tr>
            <td>所属：{{ $user->department }}</td>
            <td>氏名：{{ $user->name }}</td>
            <td>コード：</td>
            <td>出勤日数：日</td>
            <td>締日：</td>
    </tr>
    </table>
</div>
@endsection
