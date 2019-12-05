<?php

use App\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//login処理
Auth::routes();
Route::get('/home', 'SearchesController@index')->name('home');

//キーワード登録処理
Route::post('/searches', 'SearchesController@store');

//キーワードの検索履歴表示                                                                                                                             
Route::get('/', 'SearchesController@index');

//削除処理の実行
Route::post('/search/delete{search}', 'SearchesController@destroy');
