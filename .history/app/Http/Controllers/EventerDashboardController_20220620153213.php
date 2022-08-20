<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventer;

class EventerDashboardController extends Controller
{
    public function index()
    {
        $eventers = Eventer::all();

        return view('eventer.dashboard', ['eventers' => $eventers,]);
    }
}
