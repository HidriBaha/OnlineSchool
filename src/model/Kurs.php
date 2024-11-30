<?php

namespace model;

class Kurs
{
    public $id;
    public $kurs_nr;
    public $titel;
    public $author;
    public $img;
    public $beschreibung;
    public $thema_id;

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

}