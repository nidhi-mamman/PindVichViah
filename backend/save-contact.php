<?php
require_once 'firebase-config.php';

// Example: Save contact form data to Firebase
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $newContact = [
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'timestamp' => date('c')
    ];

    $firebase->getReference('contacts')->push($newContact);
    echo 'Contact saved!';
} else {
    echo 'Invalid request.';
}
?>
