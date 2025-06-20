<?php

include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'] ?? '';
    $new_password = $_POST['new_password'] ?? '';

    // Prepare statement to check if student exists
    $stmt = mysqli_prepare($conn, "SELECT student_id FROM student_penalties  WHERE student_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $student_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 0) {
        echo "Student ID not found.";
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit;
    }
    mysqli_stmt_close($stmt);

    // Hash the password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Prepare update statement
    $update_stmt = mysqli_prepare($conn, "UPDATE student_penalties SET password = ? WHERE student_id = ?");
    mysqli_stmt_bind_param($update_stmt, "ss", $hashed_password, $student_id);

    if (mysqli_stmt_execute($update_stmt)) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }

    mysqli_stmt_close($update_stmt);
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
?>
