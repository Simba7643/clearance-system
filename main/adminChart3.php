<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $student_id = mysqli_real_escape_string($conn, trim($_POST['student_id']));
    $department = mysqli_real_escape_string($conn, trim($_POST['department']));

    $reason = isset($_POST['reason']) ? mysqli_real_escape_string($conn, trim($_POST['reason'])) : null;
    $days = isset($_POST['days']) && is_numeric($_POST['days']) ? intval($_POST['days']) : null;
    $type = isset($_POST['type']) ? mysqli_real_escape_string($conn, trim($_POST['type'])) : null;
    $date = isset($_POST['date']) ? mysqli_real_escape_string($conn, trim($_POST['date'])) : null;

    // Validate required fields
    if (!$name || !$student_id || !$department) {
        die("Name, Student ID, and Department are required.");
    }

    // Check if penalty record for the same student exists
    $checkQuery = "SELECT id FROM student_penalties WHERE name = ? AND student_id = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "ss", $name, $student_id);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        // Existing record found – update it
        $updateQuery = "UPDATE student_penalties SET reason = ?, days = ?, type = ?, date = ? WHERE name = ? AND student_id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "sissss", $reason, $days, $type, $date, $name, $student_id);

        if (mysqli_stmt_execute($updateStmt)) {
            echo "<div style='color:green;text-align:center;margin-top:20px;'> successfull .</div>";
        } else {
            echo "Error updating penalty: " . mysqli_error($conn);
        }
    } else {
        // No record – insert new
        $insertQuery = "INSERT INTO student_penalties (name, student_id, department, reason, days, type, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "sssisss", $name, $student_id, $department, $reason, $days, $type, $date);

        if (mysqli_stmt_execute($insertStmt)) {
            echo "<div style='color:green;text-align:center;margin-top:20px;'> successfull.</div>";
        } else {
            echo "Error adding student: " . mysqli_error($conn);
        }
    }
} else {
    echo "Invalid request.";
}
       

        




?>






