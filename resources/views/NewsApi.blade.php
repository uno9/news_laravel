@extends('layouts.app')
@section('content')

<script src="{{ asset('js/newsApi_ajax.js') }}" defer></script>

<div class="panel-body">
    <div class="panel panel-default">
        <div class="panel-heading">検索結果</div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>ニュース一覧/th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody id="echo">
                    <!--データ出力部分-->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
