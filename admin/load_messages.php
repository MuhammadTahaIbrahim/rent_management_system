<?php
include("config.php");

if (isset($_GET['contact_id'])) {
    $contact_id = intval($_GET['contact_id']);

    $stmt = $conn->prepare("SELECT * FROM chat_messages WHERE contact_id = ?");
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<p><strong>' . htmlspecialchars($row['sender']) . ':</strong> ' . htmlspecialchars($row['message']) . '</p>';
    }

    $stmt->close();
    $conn->close();
}
?>
