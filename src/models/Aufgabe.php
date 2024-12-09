<?php

namespace models;

class Aufgabe
{
    private $id;
    private $aufgabenNr;
    private $kursID;
    private $kapitelNr;
    private $aufgabenstellung;
    private $tipp;
    private $imgSrc;

    private array $loesungen = [];

    /**
     * @param $id
     * @param $aufgabenNr
     * @param $kursID
     * @param $kapitelNr
     * @param $aufgabenstellung
     * @param $tipp
     * @param $imgSrc
     */
    public function __construct($id, $aufgabenNr, $kursID, $kapitelNr, $aufgabenstellung, $tipp, $imgSrc)
    {
        $this->id = $id;
        $this->aufgabenNr = $aufgabenNr;
        $this->kursID = $kursID;
        $this->kapitelNr = $kapitelNr;
        $this->aufgabenstellung = $aufgabenstellung;
        $this->tipp = $tipp;
        $this->imgSrc = $imgSrc;
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
    public function getAufgabenNr()
    {
        return $this->aufgabenNr;
    }

    /**
     * @param mixed $aufgabenNr
     */
    public function setAufgabenNr($aufgabenNr): void
    {
        $this->aufgabenNr = $aufgabenNr;
    }

    /**
     * @return mixed
     */
    public function getKursID()
    {
        return $this->kursID;
    }

    /**
     * @param mixed $kursID
     */
    public function setKursID($kursID): void
    {
        $this->kursID = $kursID;
    }

    /**
     * @return mixed
     */
    public function getKapitelNr()
    {
        return $this->kapitelNr;
    }

    /**
     * @param mixed $kapitelNr
     */
    public function setKapitelNr($kapitelNr): void
    {
        $this->kapitelNr = $kapitelNr;
    }

    /**
     * @return mixed
     */
    public function getAufgabenstellung()
    {
        return $this->aufgabenstellung;
    }

    /**
     * @param mixed $aufgabenstellung
     */
    public function setAufgabenstellung($aufgabenstellung): void
    {
        $this->aufgabenstellung = $aufgabenstellung;
    }

    /**
     * @return mixed
     */
    public function getTipp()
    {
        return $this->tipp;
    }

    /**
     * @param mixed $tipp
     */
    public function setTipp($tipp): void
    {
        $this->tipp = $tipp;
    }

    /**
     * @return mixed
     */
    public function getImgSrc()
    {
        return $this->imgSrc;
    }

    /**
     * @param mixed $imgSrc
     */
    public function setImgSrc($imgSrc): void
    {
        $this->imgSrc = $imgSrc;
    }

    public function getLoesungen(): array
    {
        return $this->loesungen;
    }

    public function setLoesungen(array $loesungen): void
    {
        $this->loesungen = $loesungen;
    }
}