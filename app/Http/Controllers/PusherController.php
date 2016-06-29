<?php

namespace App\Http\Controllers;

use Pusher;

class PusherController extends Controller
{
    public function authenticate()
    {
        $config = config('broadcasting.connections.pusher');

        $pusher = new Pusher($config['key'], $config['secret'], $config['app_id'], array('cluster' => 'ap1'));

        return $pusher->socket_auth(request()->get('channel_name'), request()->get('socket_id'));
    }
    public function test()
    {
        $config = config('broadcasting.connections.pusher');

        $pusher = new Pusher($config['key'], $config['secret'], $config['app_id'], array('cluster' => 'ap1'));
	$pusher->trigger('private-dashboard', 'test', 'data');
	return "ok";
    }
}
