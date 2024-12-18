<?php

use models\Kurs;

require_once '../models/Kurs.php';
require_once '../messages.php';


class LandingpageController
{

    public function landingPage()
    {
        $conn=connectdb();
        $userID=$_SESSION["userID"];
        global  $messages;
        // Sort the messages array by date in descending order to get the most recent messages first
        usort($messages, function ($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });
        $sql = "SELECT T.NAME,K.ID,KURS_NR,TITEL,AUTHOR,IMG,BESCHREIBUNG,THEMA_ID,T.FAECHER_ID,T.NAME AS THEMA_NAME,F.NAME AS FACH_NAME,AUFGABEN.COUNT_AUFGABEN,AUFGABEN_COMPLETET.COUNT_LOESUNGNE,(CAST(AUFGABEN_COMPLETET.COUNT_LOESUNGNE AS DOUBLE)/AUFGABEN.COUNT_AUFGABEN)AS PROGRESS FROM KURSE K JOIN THEMA T ON K.THEMA_ID = T.ID JOIN FAECHER F ON T.FAECHER_ID = F.ID  JOIN (SELECT COUNT(KURS_ID) AS 'COUNT_AUFGABEN', KURS_ID FROM AUFGABEN A GROUP BY A.KURS_ID) AS AUFGABEN ON AUFGABEN.KURS_ID = K.ID  JOIN (SELECT COUNT(KURS_ID) AS 'COUNT_LOESUNGNE', ATC.KURS_ID, UCT.USER_ID AS 'USER_ID' FROM USER_COMPLETED_TASKS UCT JOIN AUFGABEN ATC ON UCT.AUFGABE_ID = ATC.ID  GROUP BY ATC.KURS_ID,UCT.USER_ID) AS AUFGABEN_COMPLETET ON AUFGABEN_COMPLETET.KURS_ID = K.ID AND AUFGABEN_COMPLETET.USER_ID = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $userID);
$stmt->execute();
        $results = $stmt->get_result();

        $recentMessages = array_slice($messages, 0, 4);
        $kurse = $this->getKursFromResult($results);
        $vars = [
            'kurse' => $kurse, 'recentMessages' => $recentMessages,
        ];
        return view('landingpage.landingpage', $vars);
    }
    function getKursFromResult($results): array
    {
        $kurse = [];
        while ($row = $results->fetch_assoc()) {
            $thema = $row["NAME"];
            if (!isset($kurse[$thema])) {
                $kurse[$thema] = [];
            }
            $kurs = new Kurs($row['ID'], $row['KURS_NR'], $row['TITEL'], $row['AUTHOR'], $row['IMG'], $row['BESCHREIBUNG'], $row['THEMA_ID'],$row["FAECHER_ID"],$row["FACH_NAME"],$row["THEMA_NAME"]);
            $kurs->setProgress($row["PROGRESS"]);
            array_push($kurse[$thema], $kurs);
        }
        return $kurse;
    }
}