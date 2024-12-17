<?php

include_once "../models/User.php";

use function models\getAllUserAccounts;
use function models\insertUser;
use function models\verifyUser;

require_once '../messages.php';

class UserController
{

    public function login(RequestData $requestData)
    {
        return view("login.login", []);
    }

    public function verifyLogin(RequestData $requestData)
    {
        $body = $requestData->getPostData();
        $email = $body['email'];
        $passwort = $body['password'];
        if (verifyUser($email, $passwort)) {
            header('Location: ' . "/");
        } else {
            header('Location: ' . "login");
        }
    }

    public function logout(RequestData $requestData)
    {
        session_destroy();
        session_regenerate_id();
        header('Location: ' . "login");
    }

    public function registerUser(RequestData $requestData)
    {
        $body = $requestData->getPostData();
        $email = $body['email'];
        $password = $body['password'];
        $role = $body['role'];
        $vorname = $body['vorname'];
        $nachname = $body['nachname'];
        $geburtsdatum = $body['geburtsdatum'];
        $adresse = $body['adresse'];

        insertUser($email, $password, $role, $vorname, $nachname, $geburtsdatum, $adresse);

        return view("login.register", []);
    }

    public function register(RequestData $requestData)
    {
        return view("login.register", []);
    }

    public function allUser()
    {
        $result = getAllUserAccounts();
        $var = ["userList" => $result];
        return view("login.alluser", $var);
    }

}