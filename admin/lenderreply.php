<?php
include("_navbar.php");
include("_sidebar.php");
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if (isset($_GET['reply_id'])) {
    $reply_id = intval($_GET['reply_id']);
    $stmt = $conn->prepare("SELECT * FROM lenders WHERE l_Id = ?");
    $stmt->bind_param("i", $reply_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $lender = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lender_email = $_POST['l_email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'quratulainb66@gmail.com';  // SMTP username
        $mail->Password = 'bifh sroi ercy jbrv';  // SMTP password
        $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;  // TCP port to connect to 

        // Recipients
        $mail->setFrom('quratulainb66@gmail.com', 'Dressify Admin');
        $mail->addAddress($lender_email); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Reply from Dressify Admin';
        $mail->Body    = nl2br($message); // Convert newlines to <br> for HTML email
        $mail->AltBody = $message; // Plain text alternative

        $mail->send();
        echo "<script>
                alert('Message sent successfully');
                window.location.href='lenders.php';
              </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Reply to Lender</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Lenders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Reply to Lender</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Send Message to Lender</h4>
            <form method="post">
              <input type="hidden" name="l_email" value="<?php echo htmlspecialchars($lender['l_email']); ?>">
              <div class="form-group">
                <label for="l_name">Name :</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($lender['l_name']); ?>" id="l_name" name="l_name" disabled>
              </div>
              <div class="form-group">
                <label for="message">Message :</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

<?php
include("_footer.php");
?>
