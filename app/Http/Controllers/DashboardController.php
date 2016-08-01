<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $pusherKey = config('broadcasting.connections.pusher.key');

        return view('dashboard')->with(compact('pusherKey'));
    }
    public function indexTrello()
    {
        $pusherKey = config('broadcasting.connections.pusher.key');

        return view('dashboard2')->with(compact('pusherKey'));
    }
}
