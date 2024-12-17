<?php

namespace models;
function loadFachByName($name)
{
    $conn = connectdb();
    $sql = "SELECT ID,NAME FROM FAECHER WHERE NAME = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    return new Faecher($row["ID"], $row["NAME"]);
}

function loadFacher(): array
{
    $conn = connectdb();
    $sql = "SELECT ID, NAME FROM FAECHER";
    $stmt = $conn->query($sql);
    $faecher = [];
    while (($row = $stmt->fetch_assoc()) !== null) {
        array_push($faecher, new Faecher($row["ID"], $row["NAME"]));
    }
    return $faecher;
}


function get_Faecher(): array
{
    $conn = connectdb();
    $sql = "SELECT NAME, ID FROM FAECHER";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}


class Faecher
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

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


}