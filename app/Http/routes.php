<?php

Route::group(['middleware' => 'auth.very_basic'], function () {
    Route::get('/', 'DashboardController@index');
    Route::post('/pusher/authenticate', 'PusherController@authenticate');
    Route::get('/pushertest', 'PusherController@test');
});

Route::post('/webhook/github', 'GitHubWebhookController@gitRepoReceivedPush');

Route::get('/testing', function() {
	return 'testing';
});
