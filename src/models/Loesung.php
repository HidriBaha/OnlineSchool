<?php

namespace models;

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