<?php

require_once '../kurs.php';
require_once '../messages.php';

class UserController
{

    public function login()
    {
        return view("login.login", []);
    }

    public function verifyLogin()
    {
        $email = $_POST['email'];
        $passwort = $_POST['password'];

        if ($this->verifyUser($email, $passwort)) {
            global $kurse, $messages;
            // Sort the messages array by date in descending order to get the most recent messages first
            usort($messages, function ($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });

            $recentMessages = array_slice($messages, 0, 4);
            $vars = [
                'kurse' => $kurse, 'recentMessages' => $recentMessages
            ];
            return view('landingpage.landingpage', $vars);
        } else {
            return view("login.login", []);
        }
    }

    public function logout()
    {
        $_SESSION = [];
        return view("login.login", []);
    }

    public function register()
    {
        return view("login.register", []);
    }

    public function registerUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $geburtsdatum = $_POST['geburtsdatum'];
        $adresse = $_POST['adresse'];

        if ($this->insertUser($email, $password, $role, $vorname, $nachname, $geburtsdatum, $adresse)) {
            //TODO errorHandeling
        }
        return $this->register();
    }

    public function allUser()
    {

        $conn = connectdb();
        $sql = "SELECT ID, EMAIL, VORNAME, NACHNAME, ROLLE, GEBURTSDATUM, ADRESSE FROM USERS";
        $result = $conn->query($sql);
        $var = ["userList" => $result];
        return view("login.alluser", $var);
    }


    private function verifyUser($email, $passwort)
    {

        $conn = connectdb();
        $sql = "SELECT * FROM USERS WHERE EMAIL = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows != 1) {
            return false;
        }
        $row = $result->fetch_assoc();
        if (!password_verify($passwort, $row['passwort'])) {
            return false;
        }
        $_SESSION['userID'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['rolle'];
        $_SESSION['vorname'] = $row['vorname']; // Vorname für Begrüßung speichern
        return true;
    }

    private function insertUser($email, $password, $role, $vorname, $nachname, $geburtsdatum, $adresse): bool
    {

        $conn = connectdb();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO USERS (EMAIL, PASSWORT, ROLLE, VORNAME, NACHNAME, GEBURTSDATUM, ADRESSE) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $email, $hashed_password, $role, $vorname, $nachname, $geburtsdatum, $adresse);

        try {
            return $stmt->execute();
        } catch (Exception $e) {
            return false;
        }

    }

}