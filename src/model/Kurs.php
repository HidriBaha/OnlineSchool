<?php

namespace model;

class Kurs
{
    public $id;
    public $name;
    public $beschreibung;

    public function __construct($id, $name, $beschreibung) {
        $this->id = $id;
        $this->name = $name;
        $this->beschreibung = $beschreibung;
    }
}