<?php

namespace models;
require_once '../db-utils/db-setup.php';

function getMessages(string $email): array {
    global $conn;

    $stmt = $conn->prepare("
        SELECT 
            topic, 
            date,
            message,
            sender,
            recipient
        FROM nachrichten
        WHERE sender = ? OR recipient = ?
        ORDER BY 
            date DESC
    ");
    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}


function sendMessage(string $topic, string $recipient, string $sender, string $message) {
    global $conn;

    $sql = "INSERT INTO nachrichten (topic, sender, recipient, message, date) VALUES(?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $topic, $sender, $recipient, $message);
    $stmt->execute();
    $stmt->close();
}