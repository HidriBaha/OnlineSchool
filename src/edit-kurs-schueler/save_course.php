<?php
// TODO: Account verification and SQL Query
    $ABBORTED_BY_USER = 'abort';
    if (!empty($_POST[$ABBORTED_BY_USER])) {
        echo "NAH";
        die();
    }

    $SQL_ADDRESS = '';
    $SQL_USERNAME = '';
    $SQL_PASSWORD = '';

    $SQL_CONNECTION = new mysqli($SQL_ADDRESS, $SQL_USERNAME, $SQL_PASSWORD);

    // Check connection to DB
    if ($SQL_CONNECTION->connect_error) {
        die("Connection failed: " . $SQL_CONNECTION->connect_error);
    }
