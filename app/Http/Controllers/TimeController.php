<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeController extends Controller
{
    public function index(){
        $dt = Carbon::now();
        $times = [
            "Today" => $dt,
        ];
        return view('time', ['times' => $times]);
    }
}
