<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Applie;

class AppliesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {

        $email = $request->input('email');
        return view('applies')->with($email);
    }

    /*
    public function indexLoginUser(Request $request)
    {
        $email = $request->input('email');
        $users = \App\Models\User::find($id); //まだ
        return view('detail')->with($email);
    }
    */

    /*
    public function insertUserApplies(Request $request)
    {
        $keyword = $request->input('keyword');
        $appear_date_start = $request->input('appear_date_start');
        $appear_date_end = $request->input('appear_date_end');
        $address = $request->input('address');
        $genre = $request->input('genre');
        $applies = \App\Models\Applie::create(['name' => 'Flight 10']);
    }
    */

}
