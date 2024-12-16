<?php

require_once '../models/Nachrichten.php';
use function \models\getMessages;

class KommunikationsController
{
    public function kommunikation()
    {
        session_start();
        $messages = [];
        if(isset($_SESSION['email'])){
            $messages = getMessages($_SESSION['email']);
        }
        $vars = ["messages" => $messages];
        return view('kommunikation.kommunikation', $vars);
    }

    public function senden(){
        $topic = $_POST['topic'];
        $recipient = $_POST['recipient'];
        $sender = $_SESSION['email'];
        $message = $_POST['message'];
    }
}
