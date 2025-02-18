@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
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
<div class="display-date__items">
    <form action="/before_day" method="get">
        @csrf
        <input type="hidden" name="display_date" value="{{$display_date}}">
        <input class="before-day__button" type="submit" value="<">
    </form>

    <div class="display-date">{{$display_date}}</div>

    <form action="/next_day" method="get">
        @csrf
        <input type="hidden" name="display_date" value="{{$display_date}}">
        <input class="next-day__button" type="submit" value=">">
    </form>
</div>

<div class="calendar__items">
    <form class="calendar__form" action="/calendar" method="get">
        @csrf
        <input type="date" class="select-display-date" name=" select_date" >
        <input class="search__button" type="submit" value="検索">
    </form>
</div>

    <table class="date-list__table">
        <tr class="date-list__row">
            <th class="date-list__header">名前</th>
            <th class="date-list__header">勤務開始</th>
            <th class="date-list__header">勤務終了</th>
            <th class="date-list__header">休憩時間</th>
            <th class="date-list__header">勤務時間</th>
        </tr>

        @foreach($item_records as $item_record)
        <tr class="date-list__row">
            <td class="date-list__data">{{$item_record->user->name}}</td>
            <td class="date-list__data">{{$item_record->clock_in}}</td>
            <td class="date-list__data">{{$item_record->clock_out}}</td>
            <td class="date-list__data">{{$item_record->break_time_total}}</td>
            <td class="date-list__data">{{$item_record->time_worked}}</td>
        </tr>
        @endforeach
    </table>

    {{ $item_records->appends(Request::all())->links("vendor.pagination.bootstrap-4") }}

@stop