<?php

namespace models;
function verifyUser($email, $passwort): bool
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
    var_dump($row);

    if (!password_verify($passwort, $row['passwort'])) {
        return false;
    }
    $_SESSION['userId'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['role'] = $row['rolle'];
    $_SESSION['vorname'] = $row['vorname']; // Vorname für Begrüßung speichern
    return true;
}

function insertUser($email, $password, $role, $vorname, $nachname, $geburtsdatum, $adresse): bool
{

    $conn = connectdb();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO USERS (EMAIL, PASSWORT, ROLLE, VORNAME, NACHNAME, GEBURTSDATUM, ADRESSE) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $email, $hashed_password, $role, $vorname, $nachname, $geburtsdatum, $adresse);

    return $stmt->execute();
}

function getAllUserAccounts()
{
    $conn = connectdb();
    $sql = "SELECT ID, EMAIL, VORNAME, NACHNAME, ROLLE, GEBURTSDATUM, ADRESSE FROM USERS";
    return $conn->query($sql);
}

class User
{

    private $id;
    private $email;
    private $password;
    private $rolle;
    private $vorname;
    private $nachname;
    private $geburstdatum;
    private $addresse;

    /**
     * @param $id
     * @param $email
     * @param $password
     * @param $rolle
     * @param $vorname
     * @param $nachname
     * @param $geburstdatum
     * @param $addresse
     */
    public function __construct($id, $email, $password, $rolle, $vorname, $nachname, $geburstdatum, $addresse)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->rolle = $rolle;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->geburstdatum = $geburstdatum;
        $this->addresse = $addresse;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRolle()
    {
        return $this->rolle;
    }

    /**
     * @param mixed $rolle
     */
    public function setRolle($rolle): void
    {
        $this->rolle = $rolle;
    }

    /**
     * @return mixed
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * @param mixed $vorname
     */
    public function setVorname($vorname): void
    {
        $this->vorname = $vorname;
    }

    /**
     * @return mixed
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * @param mixed $nachname
     */
    public function setNachname($nachname): void
    {
        $this->nachname = $nachname;
    }

    /**
     * @return mixed
     */
    public function getGeburstdatum()
    {
        return $this->geburstdatum;
    }

    /**
     * @param mixed $geburstdatum
     */
    public function setGeburstdatum($geburstdatum): void
    {
        $this->geburstdatum = $geburstdatum;
    }

    /**
     * @return mixed
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * @param mixed $addresse
     */
    public function setAddresse($addresse): void
    {
        $this->addresse = $addresse;
    }




}