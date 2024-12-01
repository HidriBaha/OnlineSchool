<?php
require_once "../kurs.php";

class KursOverviewController
{
    public function kursOverview()
    {
        global $kurseThema, $kurseTitle, $thema;
        $vars = ["kurseThema" => $kurseThema, "kurseTitle" => $kurseTitle, "thema" => $thema];
        return view('kursoverview.kursoverview', $vars);
    }
}