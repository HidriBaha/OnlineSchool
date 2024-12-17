<?php

namespace models;

function getMessages(string $email): array {
    $conn = connectdb();

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
    $conn = connectdb();

    $sql = "INSERT INTO nachrichten (topic, sender, recipient, message, date) VALUES(?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $topic, $sender, $recipient, $message);
    $stmt->execute();
    $stmt->close();
}