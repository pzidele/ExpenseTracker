<?php

require __DIR__ . '/vendor/autoload.php'; // Include the Twilio PHP library

use Twilio\Rest\Client;

$accountSid = 'AC472684af8877904a3a87c2c401c4e981';
$authToken = '59a8227a8b3c169578792cc57d011b35';
$twilioNumber = '+18445922502'; 

function sendText($phoneNumber, $message) {
    global $accountSid, $authToken, $twilioNumber;

    $client = new Client($accountSid, $authToken);

    $client->messages->create(
        $phoneNumber,
        [
            'from' => $twilioNumber,
            'body' => $message
        ]
    );
}

// Retrieve the new user's information from the request
$userPhoneNumber = $_POST['phone']; // Adjust this based on your form input field name
$userMessage = 'Welcome to the Expense Tracker Website!'; 

// Call the sendText function to send the text message
sendText($userPhoneNumber, $userMessage);

