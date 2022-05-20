<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Http\Livewire;

class OffersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $offers = \App\Models\Offer::latest()->paginate(20)->get();
        return view('search', ['offers' => $offers]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $appear_date_start = $request->appear_date_start;
        $appear_date_end = $request->appear_date_end;
        $address = $request->address;
        $genre = $request->genre;

        //条件なし
        if(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = \App\Models\Offer::latest()->paginate(20)->get();
            $message = "検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードのみ
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切って配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、部分一致するものを$queryとして保持
            foreach($wordArraySearched as $value) {
                $query->where('*','like', '%' .$keyword. '%');
            }

            $offers = $query->where('*','like', '%' .$keyword. '%')->latest()->paginate(20);
            $message = "「". $keyword."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付のみ
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('appear_date','>=', $appear_date_start)->get();
            $message = $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以前の日付のみ
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('appear_date','<=', $appear_date_end)->get();
            $message = $appear_date_end. "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //地域のみ
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->get();
            $message = "「". $address."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //ジャンルのみ
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('genre','like', '%' .$genre. '%')->get();
            $message = "「". $genre."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以降の日付
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('*','like', '%' .$keyword. '%')->where('appear_date','>=', $appear_date_start)->get();
            $message = "「".$keyword . "」を含む". $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以前の日付
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('*','like', '%' .$keyword. '%')->where('appear_date','<=', $appear_date_end)->get();
            $message = "「".$keyword . "」を含む". $appear_date_end. "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと地域
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('*','like', '%' .$keyword. '%')->where('address','like', '%' .$address. '%')->get();
            $message = "「".$keyword . "」と". "「". $address."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードとジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('*','like', '%' .$keyword. '%')->where('genre','like', '%' .$genre. '%')->get();
            $message = "「".$keyword . "」と". "「". $genre."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付と以前の日付 まだおわってない
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('appear_date','BETWEEN' .$appear_date_start. 'AND')->get();
            $message = "「".$keyword . "」と". "「". $genre."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //↓以降サンプル
        elseif(!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1)
        {
            $query = Offer::query();
            $offers = $query->where('name','like', '%' .$keyword_name. '%')->where('age','>=', $keyword_age)->get();
            $message = "「".$keyword_name . "」を含む名前と". $keyword_age. "歳以上の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 1){
            $query = Offer::query();
            $offers = $query->where('sex','男')->get();
            $message = "男性の検索が完了しました";
                return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 2){
            $query = Offer::query();
            $offers = $query->where('sex','女')->get();
            $message = "女性の検索が完了しました";
                return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                ]);
        }

        else {
        $message = "検索結果はありません。";
            return view('search')->with('message',$message);
        }
    }

}