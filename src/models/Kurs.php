<?php

namespace models;

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
        array_push($this->kapitel,$kapitel);
    }

}