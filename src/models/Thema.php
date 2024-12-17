<?php

namespace models;

function get_Themen(string $id): array
{
    $conn = connectdb();
    $sql="SELECT name FROM thema WHERE faecher_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function loadThemen(): array
{
    $conn = connectdb();
    $sql = "SELECT ID, NAME, FAECHER_ID FROM THEMA";
    $stmt = $conn->query($sql);
    $themen = [];
    while (($row = $stmt->fetch_assoc()) !== null) {
        array_push($themen, new Thema($row["ID"], $row["NAME"], $row["FAECHER_ID"]));
    }
    return $themen;
}

function updateKursThemaId($kursId, $themaId): bool
{
    $conn = connectdb();
    $sql = "UPDATE KURSE SET THEMA_ID = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $themaId, $kursId);
    return $stmt->execute();
}

class Thema
{
    private $id;
    private $name;
    private $faecherId;

    /**
     * @param $id
     * @param $name
     * @param $faecherId
     */
    public function __construct($id, $name, $faecherId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->faecherId = $faecherId;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFaecherId()
    {
        return $this->faecherId;
    }

    /**
     * @param mixed $faecherId
     */
    public function setFaecherId($faecherId): void
    {
        $this->faecherId = $faecherId;
    }


}