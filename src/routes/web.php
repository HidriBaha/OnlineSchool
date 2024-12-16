<?php

return array(
    '/' => "LandingpageController@landingPage",
    '/login' => "UserController@login",
    '/logout' => "UserController@logout",
    '/reqistrieren' => "UserController@register",
    '/registerUser' => "UserController@registerUser",
    '/users' => "UserController@allUser",
    '/verifyLogin' => "UserController@verifyLogin",
    '/kurs-overview' => "KursOverviewController@kursOverview",
    '/kurs-edit' => 'KursEditController@kursEdit',
    '/kommunikation' => 'KommunikationsController@kommunikation',
    '/kommunikation/senden' => 'KommunikationsController@senden',
);
