<?php

namespace models;

class Kapitel
{
    private $kursID;
    private $kapitelNR;
    private $definition;
    private $aufgaben=[];

    private Erklaerung $erklaerung;

    /**
     * @param $kursID
     * @param $kapitelNR
     * @param $definition
     */
    public function __construct($kursID, $kapitelNR, $definition)
    {
        $this->kursID = $kursID;
        $this->kapitelNR = $kapitelNR;
        $this->definition = $definition;
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
    public function getKapitelNR()
    {
        return $this->kapitelNR;
    }

    /**
     * @param mixed $kapitelNR
     */
    public function setKapitelNR($kapitelNR): void
    {
        $this->kapitelNR = $kapitelNR;
    }

    /**
     * @return mixed
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @param mixed $definition
     */
    public function setDefinition($definition): void
    {
        $this->definition = $definition;
    }

    /**
     * @return mixed
     */
    public function getAufgaben()
    {
        return $this->aufgaben;
    }

    /**
     * @param mixed $aufgaben
     */
    public function setAufgaben(array $aufgaben): void
    {
        $this->aufgaben = $aufgaben;
    }

    public function getErklaerung(): Erklaerung
    {
        return $this->erklaerung;
    }

    public function setErklaerung(Erklaerung $erklaerung): void
    {
        $this->erklaerung = $erklaerung;
    }


}