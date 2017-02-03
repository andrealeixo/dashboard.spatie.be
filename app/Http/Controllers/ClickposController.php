<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClickposController extends Controller
{



    public function indexClickpos()
    {
        $pusherKey = config('broadcasting.connections.pusher.key');

        return view('dashboard3')->with(compact('pusherKey'));
    }


    //
}
