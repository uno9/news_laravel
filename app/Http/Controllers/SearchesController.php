<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use App\Search;
use Validator;
use Auth;

class SearchesController extends Controller
{

    // 最初にloginチェック
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 登録処理
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'searchWord' => 'required|max:191',
        ]);
        //バリデーションがエラーのとき
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // dd($request);
        //Eloquent モデル
        $search = new Search;
        $search->user_id = Auth::user()->id;
        //eloqentモデルのsearchにformname:searchWordの内容を送る
        $search->searchWord = $request->searchWord;
        $search->save();
        //登録完了後ルートにリダイレクト
        return redirect('/');
    }

    // 表示処理関数
    public function index()
    {
        $searches =
            Search::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('searches', [
            'searches' => $searches
        ]);
    }

    // 削除処理関数
    public function destroy(Search $search)
    {
        // urlが/search/??の形になったら、searchで該当モデルを探して、取得したidをdeleteする
        $search->delete();
        return redirect('/');
    }
}
