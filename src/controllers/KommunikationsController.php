<?php
require_once "../messages.php";

class KommunikationsController
{
    public function kommunikation()
    {
        global $messages, $klassen;
        $vars = ["klassen" => $klassen, "messages" => $messages];
        return view('kommunikation.kommunikation', $vars);
    }
}