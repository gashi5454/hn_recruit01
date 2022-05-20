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
        $offers = \App\Models\Offer::all();
        return view('search', ['offers' => $offers]);
    }

    public function search(Request $request)
    {
        $keyword_name = $request->name;
        $keyword_age = $request->age;
        $keyword_sex = $request->sex;
        $keyword_age_condition = $request->age_condition;

        if(!empty($keyword_name) && empty($keyword_age) && empty($keyword_age_condition)) {
            $query = Offer::query();
            $Offers = $query->where('name','like', '%' .$keyword_name. '%')->get();
            $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
            return view('search')->with([
                'Offers' => $Offers,
                'message' => $message,
            ]);
        }

        elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 0){
            $message = "年齢の条件を選択してください";
            return view('search')->with([
                'message' => $message,
            ]);
        }

        elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1){
            $query = Offer::query();
            $Offers = $query->where('age','>=', $keyword_age)->get();
            $message = $keyword_age. "歳以上の検索が完了しました";
            return view('search')->with([
                'Offers' => $Offers,
                'message' => $message,
            ]);
        }

        elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2){
            $query = Offer::query();
            $Offers = $query->where('age','<=', $keyword_age)->get();
            $message = $keyword_age. "歳以下の検索が完了しました";
            return view('search')->with([
                'Offers' => $Offers,
                'message' => $message,
            ]);
        }

        elseif(!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1){
            $query = Offer::query();
            $Offers = $query->where('name','like', '%' .$keyword_name. '%')->where('age','>=', $keyword_age)->get();
            $message = "「".$keyword_name . "」を含む名前と". $keyword_age. "歳以上の検索が完了しました";
            return view('search')->with([
                'Offers' => $Offers,
                'message' => $message,
            ]);
        }

        elseif(!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2){
            $query = Offer::query();
            $Offers = $query->where('name','like', '%' .$keyword_name. '%')->where('age','<=', $keyword_age)->get();
            $message = "「".$keyword_name . "」を含む名前と". $keyword_age. "歳以下の検索が完了しました";
            return view('search')->with([
                'Offers' => $Offers,
                'message' => $message,
            ]);
        }

        elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 1){
            $query = Offer::query();
            $Offers = $query->where('sex','男')->get();
            $message = "男性の検索が完了しました";
                return view('search')->with([
                'Offers' => $Offers,
                'message' => $message,
            ]);
        }

        elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 2){
            $query = Offer::query();
            $Offers = $query->where('sex','女')->get();
            $message = "女性の検索が完了しました";
                return view('search')->with([
                'Offers' => $Offers,
                'message' => $message,
                ]);
        }

        else {
        $message = "検索結果はありません。";
            return view('search')->with('message',$message);
        }

    }

}
