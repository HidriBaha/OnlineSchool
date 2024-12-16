<?php

require_once '../models/Nachrichten.php';
use function \models\getMessages;
use function models\sendMessage;

class KommunikationsController
{
    public function kommunikation()
    {
        session_start();
        $messages = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
            $this->senden();
            $_POST = array();
            header("Location: " . "/kommunikation");
            exit();
        }

        if(isset($_SESSION['email'])){
            $messages = getMessages($_SESSION['email']);
        }

        $vars = ["messages" => $messages];

        return view('kommunikation.kommunikation', $vars);
    }

    private function senden(){

        $topic = $_POST['topic'];
        $recipient = $_POST['recipient'];
        $sender = $_SESSION['email'];
        $message = $_POST['message'];

        sendMessage($topic, $recipient, $sender, $message);
    }
}
