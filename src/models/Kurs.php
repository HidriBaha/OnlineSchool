<?php

namespace models;
require_once "../models/Kapitel.php";
require_once "../models/Erklaerung.php";
require_once "../models/Aufgabe.php";
require_once "../models/Loesung.php";

use models\Aufgabe;
use models\Kapitel;
use models\Erklaerung;
use models\Loesung;

function loadKurs(mixed $kursID): Kurs
{
    $conn = connectdb();
    $sql = "SELECT * FROM KURSE WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $kursID);
    $stmt->execute();
    $result = $stmt->get_result();
    $kurs = getKursFromResult($result);
    $kurs->setKapitel(getKapitelByKursID($kursID));
    return $kurs;
}

function getKursFromResult($result): Kurs
{
    $row = $result->fetch_assoc();
    return new Kurs($row['ID'], $row['KURS_NR'], $row['TITEL'], $row['AUTHOR'], $row['IMG'], $row['BESCHREIBUNG'], $row['THEMA_ID']);
}

function getKapitelByKursID($kursID): array
{
    $sql = "SELECT K.KURS_ID, K.KAPITEL_NR, K.DEFINITION, E.ERKLAERUNGEN_NR, E.KURS_ID, E.KAPITEL_NR, E.HEADER, E.ERKLAERUNG, E.IMG_SRC FROM KAPITEL K
        JOIN ERKLAERUNGEN E ON K.KURS_ID = E.KURS_ID AND K.KAPITEL_NR =E.KAPITEL_NR
        JOIN AUFGABEN A ON K.KURS_ID =A.KURS_ID AND K.KAPITEL_NR =A.KAPITEL_NR WHERE K.KURS_ID = ?";
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $kursID);
    $stmt->execute();
    $result = $stmt->get_result();
    return getKapitelFromResult($result, $kursID);
}

function getKapitelFromResult($result, $kursID): array
{
    $kapitelArr = [];
    while (($row = $result->fetch_assoc()) != null) {
        $kapitel = new Kapitel($row['KURS_ID'], $row['KAPITEL_NR'], $row['DEFINITION']);
        $kapitel->setErklaerung(new Erklaerung($row['KURS_ID'], $row['KAPITEL_NR'], $row['ERKLAERUNGEN_NR'], $row['HEADER'], $row['ERKLAERUNG'], $row['IMG_SRC']));
        $aufgaben = loadAufgaben($kursID);
        $kapitel->setAufgaben($aufgaben);
        $kapitelArr[$kapitel->getKapitelNR()] = $kapitel;
    }
    return $kapitelArr;
}

function loadAufgaben($kursID): array
{
    $sql = "SELECT ID, AUFGABEN_NR, KURS_ID, KAPITEL_NR, AUFGABENSTELLUNG, TIPP, IMG_SRC FROM AUFGABEN WHERE KURS_ID = ?";
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kursID);
    $stmt->execute();
    $results = $stmt->get_result();
    $aufgaben = [];
    while (($row = $results->fetch_assoc()) != null) {
        $aufgabe = new Aufgabe($row['ID'], $row['AUFGABEN_NR'], $row['KURS_ID'], $row['KAPITEL_NR'], $row['AUFGABENSTELLUNG'], $row['TIPP'], $row['IMG_SRC']);
        $aufgabe->setLoesungen(loadLoesung($aufgabe->getId()));
        array_push($aufgaben, $aufgabe);
    }
    return $aufgaben;
}



function loadLoesung(int $getId): array
{
    $conn =connectdb();
    $sql = "SELECT ID, AUFGABE_ID, LOESUNG FROM LOESUNGEN WHERE AUFGABE_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $getId);
    $stmt->execute();
    $result = $stmt->get_result();
    $loesungen = [];;
    while (($row = $result->fetch_assoc()) != null) {
        array_push($loesungen, new Loesung($row['ID'], $row['AUFGABE_ID'], $row['LOESUNG']));
    }
    return $loesungen;
}

class Kurs
{
    private $id;
    private $kurs_nr;
    private $titel;
    private $author;
    private $img;
    private $beschreibung;
    private $thema_id;
    private $kapitel = [];

    public function __construct($id, $kurs_nr, $titel, $author, $img, $beschreibung, $thema_id)
    {
        $this->id = $id;
        $this->kurs_nr = $kurs_nr;
        $this->titel = $titel;
        $this->author = $author;
        $this->img = $img;
        $this->beschreibung = $beschreibung;
        $this->thema_id = $thema_id;
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
    public function getKursNr()
    {
        return $this->kurs_nr;
    }

    /**
     * @param mixed $kurs_nr
     */
    public function setKursNr($kurs_nr): void
    {
        $this->kurs_nr = $kurs_nr;
    }

    /**
     * @return mixed
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * @param mixed $titel
     */
    public function setTitel($titel): void
    {
        $this->titel = $titel;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * @param mixed $beschreibung
     */
    public function setBeschreibung($beschreibung): void
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * @return mixed
     */
    public function getThemaId()
    {
        return $this->thema_id;
    }

    /**
     * @param mixed $thema_id
     */
    public function setThemaId($thema_id): void
    {
        $this->thema_id = $thema_id;
    }


    /**
     * @param array $kapitel
     */
    public function setKapitel(array $kapitel): void
    {
        $this->kapitel = $kapitel;
    }

    /**
     * @return array
     */
    public function getKapitel(): array
    {
        return $this->kapitel;
    }

    /**
     * @return array
     */
    public function getKapitelforNr($nr): Kapitel
    {
        return $this->kapitel;
    }

    public function addKapitel($kapitel)
    {
        array_push($this->kapitel, $kapitel);
    }

}