<?php

namespace models;

function insertLoesung($kursID,$kapitelNr,$aufgabenNr,$loesung)
{
    $conn = connectdb();
    $sql = "INSERT INTO LOESUNGEN(AUFGABE_ID, LOESUNG) VALUE((SELECT ID FROM AUFGABEN WHERE KURS_ID = ? AND KAPITEL_NR = ? AND AUFGABEN_NR = ?),?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$kursID,$kapitelNr,$aufgabenNr,$loesung);
    return $stmt->execute();
}

function updateLoesung($id, $loesung):bool
{
    $conn = connectdb();
    $sql = "UPDATE Loesungen SET LOESUNG = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$loesung,$id);
    return $stmt->execute();
}

class Loesung
{
    private $id;
    private $aufgabenID;
    private $loesung;

    /**
     * @param $id
     * @param $aufgabenID
     * @param $loesung
     */
    public function __construct($id, $aufgabenID, $loesung)
    {
        $this->id = $id;
        $this->aufgabenID = $aufgabenID;
        $this->loesung = $loesung;
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
    public function getAufgabenID()
    {
        return $this->aufgabenID;
    }

    /**
     * @param mixed $aufgabenID
     */
    public function setAufgabenID($aufgabenID): void
    {
        $this->aufgabenID = $aufgabenID;
    }

    /**
     * @return mixed
     */
    public function getLoesung()
    {
        return $this->loesung;
    }

    /**
     * @param mixed $loesung
     */
    public function setLoesung($loesung): void
    {
        $this->loesung = $loesung;
    }




}