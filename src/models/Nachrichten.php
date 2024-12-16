<?php

namespace models;
require_once '../db-utils/db-setup.php';

function getMessages(string $email): array{
    print ($email);
    global $conn;

    $result = $conn->query("
        SELECT 
            topic, 
            date,
            message,
            sender AS sender_email,
            recipient AS recipient_email
        FROM nachrichten
        WHERE sender = $email OR recipient = $email
        ORDER BY 
            date DESC;
    ");

    return $result->fetch_all(MYSQLI_ASSOC);
}

function sendMessage(int $id, string $test){

}