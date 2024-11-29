<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "trishamacalintal17@gmail.com";
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Mobile: $mobile\n".
                  "Message:\n$message";
    
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    if(mail($to, $email_subject, $email_body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to send message."]);
    }
    exit;
}
?> 