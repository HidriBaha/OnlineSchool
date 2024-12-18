<?php

return array(
    '/' => "LandingpageController@landingPage",
    '/login' => "UserController@login",
    '/logout' => "UserController@logout",
    '/registrieren' => "UserController@register",
    '/registerUser' => "UserController@registerUser",
    '/users' => "UserController@allUser",
    '/verifyLogin' => "UserController@verifyLogin",
    '/kurs-overview' => "KursOverviewController@kursOverview",
    '/kurs-edit' => 'KursEditController@kursEdit',
    '/kurs-update' => 'KursEditController@kursUpdate',
    '/deleteKurs'=>'KursEditController@deleteKurs',
    '/kommunikation' => 'KommunikationsController@kommunikation',
   '/mark-task-completed' =>'KursEditController@markTaskCompleted',

);
