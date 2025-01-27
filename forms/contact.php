<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $subject = $_POST['subject'] ?? '';
  $message = $_POST['message'] ?? '';

  $to = 'julian.cavin@low-fuel.com'; // Replace with your email
  $email_subject = "Website Contact Form: $subject";
  $email_body = "
  Name: $name\n
  Email: $email\n
  Message: $message\n
  ";

  $headers = "From: customerservice@low-fuel.com\r\n";

  if (mail($to, $email_subject, $email_body, $headers)) {
    echo json_encode(["message" => "OK"]);
  } else {
    echo json_encode(["message" => "Failed to send the message. Please try again."]);
  }
} else {
  echo json_encode(["message" => "Invalid request method."]);
}
?>