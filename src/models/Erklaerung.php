<?php

namespace models;

class Erklaerung
{

    private $erklaerungenNr;
    private $kursID;
    private $kapitelNR;
    private $header;
    private $erklaerung;
    private $imgSrc;

    /**
     * @param $erklaerungenNr
     * @param $kursID
     * @param $kapitelNR
     * @param $header
     * @param $erklaerung
     * @param $imgSrc
     */
    public function __construct($erklaerungenNr, $kursID, $kapitelNR, $header, $erklaerung, $imgSrc)
    {
        $this->erklaerungenNr = $erklaerungenNr;
        $this->kursID = $kursID;
        $this->kapitelNR = $kapitelNR;
        $this->header = $header;
        $this->erklaerung = $erklaerung;
        $this->imgSrc = $imgSrc;
    }

    /**
     * @return mixed
     */
    public function getErklaerungenNr()
    {
        return $this->erklaerungenNr;
    }

    /**
     * @param mixed $erklaerungenNr
     */
    public function setErklaerungenNr($erklaerungenNr): void
    {
        $this->erklaerungenNr = $erklaerungenNr;
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
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param mixed $header
     */
    public function setHeader($header): void
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getErklaerung()
    {
        return $this->erklaerung;
    }

    /**
     * @param mixed $erklaerung
     */
    public function setErklaerung($erklaerung): void
    {
        $this->erklaerung = $erklaerung;
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



}