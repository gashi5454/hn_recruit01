<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Eventer;
use Illuminate\Support\Collection;
use Kyslik\ColumnSortable\Sortable;

class OffersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //詳細ページ表示
    public function detail($id)
    {
        $offers = \App\Models\Offer::find($id);
        $eventers = \App\Models\Eventer::find($offers->eventer_id);

        session(['url.intended' => url()->current()]);

        if (session()->has('url.intended')) {
            $currentUrl = session('url.intended');
        }

        return view('detail')->with([
            'offers' => $offers,
            'eventers' => $eventers,
            'currentUrl' => $currentUrl,
        ]);
    }

    //「\」「%」「_」をエスケープ
    public static function escapeLike($keyword)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $keyword);
    }

    //検索メソッド
    public function search(Request $request)
    {
        //検索機能準備
        $keyword = $request->input('keyword');
        $appear_date_start = $request->input('appear_date_start');
        $appear_date_end = $request->input('appear_date_end');
        $address = $request->input('address');
        $genre = $request->input('genre');
        $offersQuery = Offer::query()->sortable();
        $disp_list = $request->input('disp_list');

        //半角スペースを全角スペースにする
        $keyword = mb_convert_kana($keyword, 's');
        //スペースごとに配列に格納
        $strArry = preg_split('/[\s]+/', $keyword);

        $search_words = Collection::make($strArry)->map(function($p)
        {
            return "%" . $p . "%";
        }
        )->toArray();

        //url.intendedへ現在のページURLをセット
        session(['url.intended' => url()->current()]);
        if (session()->has('url.intended')) {
            $currentUrl = session('url.intended');
        }

        //条件なし
        if(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = \App\Models\Offer::latest('appear_date');
        }

        //フリーワードのみ
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('address', 'like', $search_word);
                    $query->orWhere('appear_date', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //以降の日付のみ
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('appear_date','>=', $appear_date_start);
        }

        //以前の日付のみ
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('appear_date','<=', $appear_date_end);
        }

        //地域のみ
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' .$address. '%');
        }

        //ジャンルのみ
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('genre','like', '%' . $genre . '%');
        }

        //フリーワードと以降の日付
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($appear_date_start){
                $query->where('appear_date','>=',$appear_date_start);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('address', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以前の日付
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($appear_date_end){
                $query->where('appear_date','<=',$appear_date_end);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('address', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと地域
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($address){
                $query->where('address','like',$address);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('appear_date', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードとジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($genre){
                $query->where('genre','like',$genre);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('address', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('appear_date', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //以降の日付と以前の日付
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
        }

        //以降の日付と地域
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' . $address . '%')
                                    ->where('appear_date','>=', $appear_date_start);
        }

        //以降の日付とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('genre','like', '%' . $genre . '%')
                                    ->where('appear_date','>=', $appear_date_start);
        }

        //以前の日付と地域
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' . $address . '%')->where('appear_date','<=', $appear_date_end);
        }

        //以前の日付とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('genre','like', '%' . $genre . '%')
                                    ->where('appear_date','<=', $appear_date_end);
        }

        //地域とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' . $address . '%')
                                    ->where('genre','like', '%' . $genre . '%');
        }

        //フリーワードと以降の日付と以前の日付
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($appear_date_start, $appear_date_end){
                $query->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('address', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以降の日付と地域
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($address,$appear_date_start){
                $query->where('address','like', '%' . $address . '%')
                        ->where('appear_date','>=', $appear_date_start);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以降の日付とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($genre,$appear_date_start){
                $query->where('genre','like', '%' . $genre . '%')
                        ->where('appear_date','>=', $appear_date_start);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('address', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以前の日付と地域
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($address,$appear_date_end){
                $query->where('address','like', '%' . $address . '%')
                        ->where('appear_date','<=', $appear_date_end);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以前の日付とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($genre,$appear_date_end){
                $query->where('genre','like', '%' . $genre . '%')
                        ->where('appear_date','<=', $appear_date_end);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('address', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと地域とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($address,$genre){
                $query->where('address','like', '%' . $address . '%')
                        ->where('genre','like', '%' . $genre . '%');
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('appear_date', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //以降の日付と以前の日付と地域
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' . $address . '%')
                                    ->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
        }

        //以降の日付と以前の日付とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('genre','like', '%' . $genre . '%')
                                    ->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
        }

        //以降の日付と地域とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' . $address . '%')
                                    ->where('genre','like', '%' . $genre . '%')
                                    ->where('appear_date','>=', $appear_date_start);
        }

        //以前の日付と地域とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' . $address . '%')
                                    ->where('genre','like', '%' . $genre . '%')
                                    ->where('appear_date','<=', $appear_date_end);

        }

        //フリーワードと以降の日付と以前の日付と地域
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($address,$appear_date_start,$appear_date_end){
                $query->where('address','like', '%' . $address . '%')
                        ->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以降の日付と以前の日付とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($genre,$appear_date_start,$appear_date_end){
                $query->where('genre','like', '%' . $genre . '%')
                        ->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('genre', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以降の日付と地域とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($genre,$address,$appear_date_start){
                $query->where('genre','like', '%' . $genre . '%')
                        ->where('address','like', '%' . $address . '%')
                        ->where('appear_date','>=', $appear_date_start);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //フリーワードと以前の日付と地域とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($genre,$address,$appear_date_end){
                $query->where('genre','like', '%' . $genre . '%')
                        ->where('address','like', '%' . $address . '%')
                        ->where('appear_date','<=', $appear_date_end);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        //以降の日付と以前の日付と地域とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' .$address. '%')
                                    ->where('genre','like', '%' . $genre . '%')
                                    ->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
        }

        //すべての条件
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $offersQuery = $offersQuery->where(function($query)use($genre,$address,$appear_date_start,$appear_date_end){
                $query->where('genre','like', '%' . $genre . '%')
                        ->where('address','like', '%' . $address . '%')
                        ->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
            });

            $offers = $offersQuery->where(function($query)use($search_words){
                $firstCondition = true;
                foreach($search_words as $search_word) {
                    if($firstCondition == true) {
                        $query->where('name', 'like', $search_word);
                        $firstCondition = false;
                    } else {
                        $query->orWhere('name', 'like', $search_word);
                    }
                    $query->orWhere('title', 'like', $search_word);
                    $query->orWhere('contents', 'like', $search_word);
                    $query->orWhere('place', 'like', $search_word);
                    $query->orWhere('postal_code', 'like', $search_word);
                    $query->orWhere('requirement', 'like', $search_word);
                }
            });
        }

        else {
            $counts = 0;
            $message = "募集情報は見つかりませんでした";
        }

        if(!is_null($offers)){
            $counts = $offers->count();
            $message = "募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
        } else {
            $offers = '';
        }
        $reqs = request()->all();
        $ad_sort = $currentUrl . '?_token=' . $reqs['_token'] .
                    '&_method=post&keyword=' . $reqs['keyword'] .
                    '&appear_date_start=' . $reqs['appear_date_start'] .
                    '&appear_date_end=' . $reqs['appear_date_end'] .
                    '&address=' . $reqs['address'] .'&sort=appear_date&direction=asc';


        /*
        http://localhost:8000/search?
            _token=sL9BQcEbhAWDzQ3FPh15AGjCmpIHsnJDM0OwJR1X
            &_method=post
            &keyword=%E3%83%86%E3%82%B9%E3%83%88+test
            &appear_date_start=2022-01-01
            &appear_date_end=2022-12-31
            &address=%E6%96%B0%E6%BD%9F%E7%9C%8C
            &genre=%E3%83%8E%E3%83%B3%E3%82%B8%E3%83%A3%E3%83%B3%E3%83%AB
            &sort=appear_date
            &direction=asc
        */

        return view('search')->with([
            'ad_sort' => $ad_sort,
            'reqs' => $reqs,
            'offers' => $offers,
            'message' => $message,
            'currentUrl' => $currentUrl,
            'counts' => $counts,
            'keyword' => $keyword,
            'appear_date_start' => $appear_date_start,
            'appear_date_end' => $appear_date_end,
            'address' => $address,
            'genre' => $genre,
        ]);

    }

}
