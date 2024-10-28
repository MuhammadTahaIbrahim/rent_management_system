<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reply_message = $_POST['reply_message'];
    $reply_id = intval($_POST['reply_id']);

    // Save message to chat_messages table
    $stmt_message = $conn->prepare("INSERT INTO chat_messages (contact_id, sender, message) VALUES (?, 'Admin', ?)");
    $stmt_message->bind_param("is", $reply_id, $reply_message);
    $stmt_message->execute();
    $stmt_message->close();

    // Fetch contact details
    $stmt_contact = $conn->prepare("SELECT contact_email FROM contact WHERE contact_id = ?");
    $stmt_contact->bind_param("i", $reply_id);
    $stmt_contact->execute();
    $contact_result = $stmt_contact->get_result();
    $contact = $contact_result->fetch_assoc();
    $user_email = $contact['contact_email'];
    $stmt_contact->close();

    // Send email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'quratulainb66@gmail.com';  // SMTP username
        $mail->Password = 'bifh sroi ercy jbrv';  // SMTP password
        $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;  // TCP port to connect to 

        $mail->setFrom('quratulainb66@gmail.com', 'Dressify');
        $mail->addAddress($user_email);

        $mail->isHTML(true);
        $mail->Subject = 'Reply to your message';
        $mail->Body    = nl2br(htmlspecialchars($reply_message));
        $mail->AltBody = htmlspecialchars($reply_message);

        $mail->send();
        echo 'Message sent!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $conn->close();
}
?>
