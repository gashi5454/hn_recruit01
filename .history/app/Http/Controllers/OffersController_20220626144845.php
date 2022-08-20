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
        $offersQuery = Offer::query();

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
            $counts = $offers->count();
            $message = "募集情報が" . $counts . "件見つかりました";
            //ページネート後にカウントすると1ページ分(10件)しかカウントされないので分けて書く
            $offers = $offers->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
                'keyword' => $keyword,
            ]);
        }

        //フリーワードのみ
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery
            ->where(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('name', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('title', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('genre', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('appear_date', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('contents', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('place', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('address', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('postal_code', 'like', $search_word);
                }
            })->orwhere(function($query)use($search_words){
                foreach($search_words as $search_word) {
                    $query->where('requirement', 'like', $search_word);
                }
            });

            $counts = $offers->count();
            $message = "募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付のみ
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('appear_date','>=', $appear_date_start);
            $counts = $offers->count();
            $message = $appear_date_start . "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->oldest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以前の日付のみ
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('appear_date','<=', $appear_date_end);
            $counts = $offers->count();
            $message = $appear_date_end . "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //地域のみ
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' .$address. '%');
            $counts = $offers->count();
            $message = "「" . $address . "」を含む募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //ジャンルのみ
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offers = $offersQuery->where('genre','like', '%' . $genre . '%');
            $counts = $offers->count();
            $message = "「" . $genre . "」を含む募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
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

            $counts = $offers->count();
            $message = "「". $keyword . "」を含む" . $appear_date_start . "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->oldest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
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

            $counts = $offers->count();
            $message = "「".$keyword . "」を含む". $appear_date_end. "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
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

            $counts = $offers->count();
            $message = "「".$keyword . "」と「". $address."」を含む募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
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

            $counts = $offers->count();
            $message = "「".$keyword . "」と「". $genre."」を含む募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付と以前の日付
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = $offersQuery->whereBetween('appear_date', [$appear_date_start, $appear_date_end]);
            $counts = $offers->count();
            $message = $appear_date_start . "から". $appear_date_end."までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付と地域
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $offers = $offersQuery->where('address','like', '%' .$address. '%')->where('appear_date','>=', $appear_date_start);
            $counts = $offers->count();
            $message = "「".$address . "」を含む". $appear_date_start. "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->oldest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$genre . "」を含む". $appear_date_start. "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以前の日付と地域
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {

            $offers = $query->where('address','like', '%' .$address. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$address . "」を含む". $appear_date_end. "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以前の日付とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {

            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$genre . "」を含む". $appear_date_end. "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //地域とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$address . "」と「". $genre."」を含む募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以降の日付と以前の日付
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$keyword . "」を含む". $appear_date_start . "から". $appear_date_end."までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以降の日付と地域
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$keyword . "」と「". $address."」を含む" . $appear_date_start. "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以降の日付とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$keyword . "」と「". $genre."」を含む" . $appear_date_start. "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->oldest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以前の日付と地域
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$keyword . "」と「". $address."」を含む" . $appear_date_end. "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以前の日付とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$keyword . "」と「". $genre."」を含む" . $appear_date_end. "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと地域とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「" . $keyword . "」と「" . $address . "」と「" . $genre . "を含む募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付と以前の日付と地域
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {

            $offers = $query->where('address','like', '%' .$address. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$address . "」を含む". $appear_date_start . "から". $appear_date_end."までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付と以前の日付とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {

            $offers = $query->where('genre','like', '%' .$genre. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「". $genre . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付と地域とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「".$address . "」と「". $genre."」を含む" . $appear_date_start. "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以前の日付と地域とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「" . $address . "」と「" . $genre . "」を含む" . $appear_date_end . "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以降の日付と以前の日付と地域
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「" . $keyword . "」と「" . $address . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以降の日付と以前の日付とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('genre','like', '%' . $genre . '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「" . $keyword . "」と「" . $genre . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以降の日付と地域とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' . $genre . '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「" . $keyword . "」と「" . $address . "」と「" . $genre . "」を含む" . $appear_date_start. "以降の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //フリーワードと以前の日付と地域とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' . $genre . '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「" . $keyword . "」と「" . $address . "」と「" . $genre . "」を含む" . $appear_date_end. "以前の募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //以降の日付と以前の日付と地域とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' . $genre . '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「" . $address . "」と「" . $genre . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        //すべての条件
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' . self::escapeLike($value) . '%')->orWhere('title','like', '%' . self::escapeLike($value) . '%')->orWhere('genre','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('appear_date','like', '%' . self::escapeLike($value) . '%')->orWhere('number_of_bands','like', '%' . self::escapeLike($value) . '%')->orWhere('contents','like', '%' . self::escapeLike($value) . '%')->orWhere('place','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('tel','like', '%' . self::escapeLike($value) . '%')->orWhere('other_contact','like', '%' . self::escapeLike($value) . '%')->orWhere('address','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('postal_code','like', '%' . self::escapeLike($value) . '%')->orWhere('capacity','like', '%' . self::escapeLike($value) . '%')->orWhere('quota','like', '%' . self::escapeLike($value) . '%')
                    ->orWhere('requirement','like', '%' . self::escapeLike($value) . '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(10);
            $counts = $offers->count();
            $message = "「". $keyword . "」と「" . $address . "」と「". $genre ."」を含む" . $appear_date_start . "から" . $appear_date_end . "までの募集情報が" . $counts . "件見つかりました";
            $offers = $offers->latest('appear_date')->paginate(10);
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }

        else {
            $counts = 0;
            $message = "募集情報は見つかりませんでした";
            return view('search')->with([
                'message' => $message,
                'currentUrl' => $currentUrl,
                'counts' => $counts,
            ]);
        }
    }

}
