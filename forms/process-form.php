<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $companyName = $_POST['companyName'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $email = $_POST['email'] ?? '';
    $fuelType = $_POST['fuelType'] ?? '';
    $equipmentType = $_POST['equipmentType'] ?? '';
    $help = $_POST['help'] ?? '';
    $notes = $_POST['notes'] ?? '';

    $to = "julian.cavin@low-fuel.com"; // Replace with your email
    $subject = " Website Request Form Submission";
    $message = "
    First Name: $firstName\n
    Last Name: $lastName\n
    Company Name: $companyName\n
    Phone Number: $phoneNumber\n
    Email: $email\n
    Fuel Type: $fuelType\n
    Equipment Type: $equipmentType\n
    How Can We Help: $help\n
    Notes: $notes\n
    ";
    $headers = "From: customerservice@low-fuel.com\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["message" => "Failed to send the message. Please try again."]);
    }
} else {
    echo json_encode(["message" => "Invalid request method."]);
}
?>