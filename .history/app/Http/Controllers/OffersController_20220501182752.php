<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Offer;

class OffersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //詳細ページ表示
    public function detail($id)
    {
        $offers = \App\Models\Offer::find($id);
        $email = \App\Models\Eventer::where('id', $id)->value('email');

        return view('detail')->with([ 'offers' => $offers , $email ]);
    }

    //まだ使ってない
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    //検索メソッド
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $appear_date_start = $request->input('appear_date_start');
        $appear_date_end = $request->input('appear_date_end');
        $address = $request->input('address');
        $genre = $request->input('genre');

        //条件なし
        if(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && empty($genre))
        {
            $offers = \App\Models\Offer::latest('appear_date')->paginate(2);
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

            // 単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、部分一致するものを$queryとして保持
            foreach($wordArraySearched as $value) {
                $query->Where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('appear_date','like', '%' .$value. '%')->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->latest('appear_date')->paginate(2);
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
            $offers = $query->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
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
            $offers = $query->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
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
            $offers = $query->where('address','like', '%' .$address. '%')->latest('appear_date')->paginate(2);
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
            $offers = $query->where('genre','like', '%' .$genre. '%')->latest('appear_date')->paginate(2);
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

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }
            $offers = $query->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
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

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
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

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('appear_date','like', '%' .$value. '%')->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where(function($query) use($address)
                {
                    $query->where('address','like', '%' .$address. '%');
                }
            )->latest('appear_date')->paginate(2);
            $message = "「".$keyword . "」と「". $address."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードとジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('appear_date','like', '%' .$value. '%')->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where(function($query) use($genre)
                {
                    $query->where('genre','like', '%' .$genre. '%');
                }
            )->latest('appear_date')->paginate(2);
            $message = "「".$keyword . "」と「". $genre."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付と以前の日付
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = $appear_date_start . "から". $appear_date_end."までの検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付と地域
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
            $message = "「".$address . "」を含む". $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
            $message = "「".$genre . "」を含む". $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以前の日付と地域
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
            $message = "「".$address . "」を含む". $appear_date_end. "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以前の日付とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
            $message = "「".$genre . "」を含む". $appear_date_end. "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //地域とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->latest('appear_date')->paginate(2);
            $message = "「".$address . "」と「". $genre."」を含む検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以降の日付と以前の日付
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = "「".$keyword . "」を含む". $appear_date_start . "から". $appear_date_end."までの検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以降の日付と地域
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
            $message = "「".$keyword . "」と「". $address."」を含む" . $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以降の日付とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
            $message = "「".$keyword . "」と「". $genre."」を含む" . $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以前の日付と地域
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
            $message = "「".$keyword . "」と「". $address."」を含む" . $appear_date_end. "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以前の日付とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('genre','like', '%' .$genre. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
            $message = "「".$keyword . "」と「". $genre."」を含む" . $appear_date_end. "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと地域とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('appear_date','like', '%' .$value. '%')->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->latest('appear_date')->paginate(2);
            $message = "「" . $keyword . "」と「" . $address . "」と「" . $genre . "を含む検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付と以前の日付と地域
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = "「".$address . "」を含む". $appear_date_start . "から". $appear_date_end."までの検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付と以前の日付とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('genre','like', '%' .$genre. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = "「". $genre . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付と地域とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
            $message = "「".$address . "」と「". $genre."」を含む" . $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以前の日付と地域とジャンル
        elseif(empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
            $message = "「" . $address . "」と「" . $genre . "」を含む" . $appear_date_end . "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以降の日付と以前の日付と地域
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')->orWhere('genre','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = "「" . $keyword . "」と「" . $address . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以降の日付と以前の日付とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')->orWhere('address','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('genre','like', '%' . $genre . '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = "「" . $keyword . "」と「" . $genre . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以降の日付と地域とジャンル
        elseif(!empty($keyword) && !empty($appear_date_start) && empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' . $genre . '%')->where('appear_date','>=', $appear_date_start)->latest('appear_date')->paginate(2);
            $message = "「" . $keyword . "」と「" . $address . "」と「" . $genre . "」を含む" . $appear_date_start. "以降の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //フリーワードと以前の日付と地域とジャンル
        elseif(!empty($keyword) && empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' . $genre . '%')->where('appear_date','<=', $appear_date_end)->latest('appear_date')->paginate(2);
            $message = "「" . $keyword . "」と「" . $address . "」と「" . $genre . "」を含む" . $appear_date_end. "以前の検索が完了しました";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //以降の日付と以前の日付と地域とジャンル
        elseif(empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();
            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' . $genre . '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = "「" . $address . "」と「" . $genre . "」を含む" . $appear_date_start . "から" . $appear_date_end . "までの検索が完了しました。";
            return view('search')->with([
                'offers' => $offers,
                'message' => $message,
            ]);
        }

        //すべての条件
        elseif(!empty($keyword) && !empty($appear_date_start) && !empty($appear_date_end) && !empty($address) && !empty($genre))
        {
            $query = Offer::query();

            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('name','like', '%' .$value. '%')->orWhere('title','like', '%' .$value. '%')
                        ->orWhere('number_of_bands','like', '%' .$value. '%')->orWhere('contents','like', '%' .$value. '%')->orWhere('place','like', '%' .$value. '%')
                        ->orWhere('tel','like', '%' .$value. '%')->orWhere('other_contact','like', '%' .$value. '%')
                        ->orWhere('postal_code','like', '%' .$value. '%')->orWhere('capacity','like', '%' .$value. '%')->orWhere('quota','like', '%' .$value. '%')
                        ->orWhere('requirement','like', '%' .$value. '%');
            }

            $offers = $query->where('address','like', '%' .$address. '%')->where('genre','like', '%' .$genre. '%')->whereBetween('appear_date', [$appear_date_start, $appear_date_end])->latest('appear_date')->paginate(2);
            $message = "「". $keyword . "」と「" . $address . "」と「". $genre ."」を含む" . $appear_date_start . "から" . $appear_date_end . "までの検索が完了しました。";
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
