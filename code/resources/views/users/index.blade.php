@extends('layouts.application')

@php
$headTitle = 'ユーザー一覧';
@endphp

@section('content')
<h1>ユーザー一覧</h1>

{{ $users->links() }}

<ul class="users">
    @foreach ($users as $user)
        @include('users._user')
    @endforeach
</ul>

{{ $users->links() }}
@endsection
