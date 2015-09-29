<?php

/**
 * 申请 access_token 或者刷新 access_token.
 */
$router->post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

/*
 * 需要 login-token 认证获得的 access_token
 */
$router->group(['middleware' => ['api.auth', 'oauth-user']], function ($router) {
    //Users
    $router->get('me', 'UsersController@me');
    $router->put('users/{id}', 'UsersController@update');

    //Topics
    $router->delete('topic/{id}', 'TopicController@delete');

    //Notifications
    $router->get('me/notifications', 'NotificationController@index');
});

/*
 * 需要 client_credentials 认证获得的 access_token
 */
$router->group(['middleware' => ['oauth', 'oauth-client']], function ($router) {
    $router->get('nodes', 'NodesController@index');
});

//TODO： 客户端还未完成认证，路由都先不用 token

// Topics
$router->resource('topics', 'TopicsController');
$router->get('topics/{id}/replies', 'RepliesController@indexByTopicId');

// Replies
$router->get('users/{id}/replies', 'RepliesController@indexByUserId');

// User
$router->resource('users', 'UsersController');
