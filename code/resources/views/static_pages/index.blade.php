@extends('layouts.application')

@php
$headTitle = 'ホーム';
@endphp

@include('layouts.header')

@section('content')
<div class="center jumbotron">
    <h1>勤怠管理システム</h1>
    <a href="#" class="btn btn-lg btn-primary">アカウント作成</a>
</div>
@endsection
