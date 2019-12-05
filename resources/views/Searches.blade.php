@extends('layouts.app')
@section('content')

<script src="{{ asset('js/newsApi_ajax.js') }}" defer></script>

<div class="panel-body">
  <!-- 入力チェックエラーの表示に使用するエラーファイル-->
  @include('common.errors')
  <!-- 検索フォーム -->
  <form action="{{ url('searches') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- 検索名 -->
    <div class="form-group">
      <div class="col-sm-6">
        <label for="search" class="col-sm-3 control-label">Powered by News API</label>
        <input type="text" name="searchWord" id="searchWord" class="form-control">
      </div>
    </div>

    <!-- 検索ボタン -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-default" id="submit">Search</button>
      </div>
    </div>
  </form>


  <!-- この下に登録済み検索ワードを表示 -->
  <!-- 表示領域  -->
  @if (count($searches)>0)
  <div class="panel panel-default">
    <div class="panel-heading">検索履歴</div>
    <div class="panel-body">
      <table class="table table-stried task-table">

        <!-- テーブルヘッダ  -->
        <thead>
          <th>キーワード検索</th>
          <th>&nbsp;</th>
        </thead>

        <!-- テーブル本体  -->
        <tbody>
          @foreach($searches as $search)
          <tr>
            <td class="table-text">

              <p>{{$search->searchWord}}</p>
              <div>{{$search->created_at}}</div>
            </td>
            <td>
              <!-- yahoofinance -->
              <form action="{{https://info.finance.yahoo.co.jp/search/?query=(.$search->searchWord)}}" method="GET">
                {{--{{ csrf_field()}}--}}
                <button type="submit" class="btn btn-primary" id="yahoo">yahooFInance</button>
              </form>

              <!-- 削除ボタン -->
              <form action="{{url('search/delete'.$search->id)}}" method="POST">
                {{ csrf_field()}}
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>

          </tr>
          @endforeach
        </tbody>

      </table>
    </div>
    @endif
    <!-- ここまで表示  -->
    <div class="panel panel-default">
      <div class="panel-heading">検索結果</div>
      <div class="panel-body">
        <table class="table table-striped task-table">
          <!-- テーブルヘッダ -->
          <thead>
            <th>ニュース一覧</th>
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