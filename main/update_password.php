<?
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $student_id = $_POST['student_id'];
    $new_password = $_POST['new_password'];
    
    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    // Prepare and bind
    $stmt = $conn->prepare("UPDATE student_penalties SET password = ? WHERE student_id = ?");
    $stmt->bind_param("ss", $hashed_password, $student_id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='container'>";
        echo "<div class='message success'>Password updated successfully!</div>";
        echo "<p><a href='change_password.html'>Back to form</a></p>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<div class='message error'>Error updating password: " . $stmt->error . "</div>";
        echo "<p><a href='change_password.html'>Back to form</a></p>";
        echo "</div>";
    }
    
    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>