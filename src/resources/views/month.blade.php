@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/month.css') }}">
@stop

@section('header_content')
<nav>
    <ul class="menu">
        <li class="menu-text"><a class="home" href="/stamp">ホーム</a></li>
        <li class="menu-text"><a class="date-list" href="/date">日付一覧</a></li>
        <li class="menu-text"><a class="users-list" href="/user">ユーザー一覧</a></li>
        <li class="menu-text">
            <form action="/logout" method="post">
                @csrf
                <input class="logout" type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
</nav>
@stop

@section('main_content')
<div class="display-name">＜月別勤怠一覧＞ {{$display_name}}</div>

<div class="display-month__items">
    <form action="/before_month" method="get">
        @csrf
        <input type="hidden" name="display_month" value="{{$display_month}}">
        <input type="hidden" name="hidden_id" value="{{$hidden_id}}">
        <input class="before-month__button" type="submit" value="<">
    </form>

    <div class="display-month">{{$display_month}}</div>

    <form action="/next_month" method="get">
        @csrf
        <input type="hidden" name="display_month" value="{{$display_month}}">
        <input type="hidden" name="hidden_id" value="{{$hidden_id}}">
        <input class="next-month__button" type="submit" value=">">
    </form>
</div>

<table class="month-list__table">
    <tr class="month-list__row">
        <th class="month-list__header">日付</th>
        <th class="month-list__header">勤務開始</th>
        <th class="month-list__header">勤務終了</th>
        <th class="month-list__header">休憩時間</th>
        <th class="month-list__header">勤務時間</th>
    </tr>

    @foreach($item_records as $item_record)
    <tr class="month-list__row">
        <td class="month-list__data">{{$item_record->date}}</td>
        <td class="month-list__data">{{$item_record->clock_in}}</td>
        <td class="month-list__data">{{$item_record->clock_out}}</td>
        <td class="month-list__data">{{$item_record->break_time_total}}</td>
        <td class="month-list__data">{{$item_record->time_worked}}</td>
    </tr>
    @endforeach
</table>

@stop