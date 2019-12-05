@extends('layouts.app')
@section('content_search')
<div class="panel-body">
    <!-- 入力チェックエラーの表示に使用するエラーファイル-->
    @include('common.errors')
    <!-- タスク登録フォーム -->
    <form action="{{ url('searches') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- タスク名 -->
        <div class="form-group">
            <div class="col-sm-6">
                <label for="search" class="col-sm-3 control-label">Search</label>
                <input type="text" name="searchWord" id="searchWord" class="form-control">
            </div>
        </div>
        <!-- タスク登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">Search</button>
            </div>
        </div>
    </form>





    @if (count($searches)>0)
    <div class="panel panel-default">
        <div class="panel-heading">検索履歴</div>
        <div class="panel-body">
            <table class="table table-stri@ed task-table">
                <!-- テーブルヘッダ  -->
                <thead>
                    <th>検索ワード</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- テーブル本体  -->
                <tbody>
                    @foreach($searches as $search)
                    <tr>
                        <td class="table-text">
                            <div>{{$search->search}}</div>
                        </td>
                        <td>
                            <!-- 削除ボタン -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <!-- ここまでタスク表示  -->
    </div>

    @endsection