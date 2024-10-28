<?php
include("_navbar.php");
include("_sidebar.php");
include("config.php");

// Handle deletion
if (isset($_GET['del_id'])) {
    $del_id = intval($_GET['del_id']);
    
    $del_query = $conn->prepare("DELETE FROM contact WHERE contact_id = ?");
    $del_query->bind_param("i", $del_id);
    
    if ($del_query->execute()) {
        echo "<script>
                alert('Deleted successfully');
                window.location.href='contact.php';
              </script>";
    } else {
        echo "Error: " . $del_query->error;
    }
    
    $del_query->close();
}


?>
<style>
  .table {
    width: 100%;
    overflow-x: auto; 
}
</style>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">Show Contact</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Contact</a></li>
          <li class="breadcrumb-item active" aria-current="page">Show Contact</li>
                </ol>
              </nav>
            </div>
            <div class="row g-4">
        <div class="col-md-12">
            <div class="table-responsive">
         
                <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
$query = "SELECT * FROM contact";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
?>
    <tr>
        <td><?php echo htmlspecialchars($row['contact_id']); ?></td>
        <td><?php echo htmlspecialchars($row['contact_name']); ?></td>
        <td><?php echo htmlspecialchars($row['contact_email']); ?></td>
        <td><?php echo htmlspecialchars($row['contact_phone']); ?></td>
        <td><?php echo htmlspecialchars($row['contact_message']); ?></td>
        <td>
            <div class="btn-group">
                <button class="btn btn-success btn-reply" 
                        data-id="<?php echo htmlspecialchars($row['contact_id']); ?>" 
                        data-name="<?php echo htmlspecialchars($row['contact_name']); ?>" 
                        data-email="<?php echo htmlspecialchars($row['contact_email']); ?>">
                    Reply
                </button>
                <a href="?del_id=<?php echo htmlspecialchars($row['contact_id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
            </div>
        </td>
    </tr>
<?php
}
?>

            </div>
        </div>
    </div>
<!-- Chat Box HTML -->
<div id="chatBox" class="chat-box">
    <div class="chat-box-header">
        <h4 id="chatUserInfo">Chat with User</h4>
        <button class="close-chat" onclick="toggleChatBox()">×</button>
    </div>
    <div class="chat-box-body">
        <div id="chatMessages" class="chat-messages"></div>
        <form id="chatForm" class="chat-form" method="post">
            <textarea name="chat_message" placeholder="Type your message..." required></textarea>
            <button type="submit" class="cbtn">Send</button>
        </form>
    </div>
</div>

<!-- CSS for Chat Box -->
<style>
  .chat-box {
    position: fixed;
    bottom: 0;
    right: 0;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background-color: #fff;
    display: none; /* Hidden by default */
  }
  .chat-box-header {
    background-color: #33c92d;
    color: #fff;
    padding: 10px;
    border-bottom: 1px solid #ccc;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .chat-box-body {
    padding: 10px;
    max-height: 400px;
    overflow-y: auto;
  }
  .chat-messages {
    margin-bottom: 10px;
  }
  .chat-form {
    display: flex;
  }
  .chat-form textarea {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
  }
  .cbtn{
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #33c92d;
    color: #fff;
    cursor: pointer;
  }
  .close-chat {
    background: none;
    border: none;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
  }
</style>

          </div>
          <!-- content-wrapper ends -->

        <!-- main-panel ends -->
        
<!-- JavaScript for Chat Box -->
<script>
    var currentReplyId = null;

    var currentReplyId = null;

function toggleChatBox(replyId, userName, userEmail) {
    var chatBox = document.getElementById('chatBox');
    var chatUserInfo = document.getElementById('chatUserInfo');
    currentReplyId = replyId;
    
    // Update chat user info
    chatUserInfo.textContent = 'Chat with ' + (userName || 'User') + (userEmail ? ' (' + userEmail + ')' : '');

    chatBox.style.display = (chatBox.style.display === 'none' || chatBox.style.display === '') ? 'block' : 'none';
    
    // Load previous messages
    if (currentReplyId !== null) {
        loadChatMessages(currentReplyId);
    }
}

function loadChatMessages(replyId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_messages.php?contact_id=' + replyId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('chatMessages').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

document.getElementById('chatForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var message = document.querySelector('textarea[name="chat_message"]').value;

    // Send message via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'contactreply.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('chatMessages').innerHTML += '<p><strong>You:</strong> ' + message + '</p>';
            document.querySelector('textarea[name="chat_message"]').value = '';
        }
    };
    xhr.send('reply_message=' + encodeURIComponent(message) + '&reply_id=' + currentReplyId);
});

// Initialize chat box
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-reply').forEach(function(button) {
        button.addEventListener('click', function() {
            var replyId = this.getAttribute('data-id');
            var userName = this.getAttribute('data-name');
            var userEmail = this.getAttribute('data-email');
            toggleChatBox(replyId, userName, userEmail);
        });
    });
});

</script>

<?php

include("_footer.php");
?>