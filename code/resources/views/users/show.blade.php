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
                指定勤務開始時間：
                {{ ($user->designated_working_start_time) ? getTime($user->designated_working_start_time, 'G') : '未設定' }}<br>
                指定勤務終了時間：
                {{ ($user->designated_working_end_time) ? getTime($user->designated_working_end_time, 'G') : '未設定' }}
            </td>
            <td colspan = "2">基本時間：{{ formatBasicTime($user->basic_time) }}</td>
            <td>初日：</td>
        </tr>
        <tr>
            <td>所属：{{ ($user->department) ? $user->department : '未設定' }}</td>
            <td>氏名：{{ $user->name }}</td>
            <td>社員番号：{{ ($user->employee_number) ? $user->employee_number : '未設定' }}</td>
            <td>出勤日数：日</td>
            <td>締日：</td>
        </tr>
    </table>

    <div>
        {{ $user }}
    </div>
</div>
@endsection
