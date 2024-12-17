<?php
require_once '../kurs.php';
require_once '../messages.php';

class LandingpageController
{

    public function landingPage()
    {
        global $kurse, $messages;
        // Sort the messages array by date in descending order to get the most recent messages first
        usort($messages, function ($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        $recentMessages = array_slice($messages, 0, 4);
        $vars = [
            'kurse' => $kurse, 'recentMessages' => $recentMessages
        ];
        return view('landingpage.landingpage', $vars);
    }
}