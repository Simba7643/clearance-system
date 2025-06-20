<?php
session_start();
require 'dbconn.php';

$message = '';

if (!isset($_SESSION['studentId']) || empty($_SESSION['studentId'])) {
    header("Location: login.html");
    exit();
}

$loggedInStudentId = $_SESSION['studentId'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id_from_form = trim($_POST['student_id'] ?? '');
    $new_password = trim($_POST['new_password'] ?? '');

    if (empty($student_id_from_form) || empty($new_password)) {
        $message = '<div class="message error">All fields are required.</div>';
    } elseif ($student_id_from_form !== $loggedInStudentId) {
        $message = '<div class="message error">Error: Student ID mismatch. You can only change your own password.</div>';
    } elseif (strlen($new_password) < 8) {
        $message = '<div class="message error">New password must be at least 8 characters long.</div>';
    } else {
        $hashedNewPassword = password_hash($new_password, PASSWORD_DEFAULT);

        $sql_update_password = "UPDATE admins SET password = ? WHERE id_number = ?";
        $stmt_update_password = $conn->prepare($sql_update_password);

        if ($stmt_update_password) {
            $stmt_update_password->bind_param("ss", $hashedNewPassword, $loggedInStudentId);
            if ($stmt_update_password->execute()) {
                if ($stmt_update_password->affected_rows > 0) {
                    $message = '<div class="message success">Password updated successfully!</div>';
                } else {
                    $message = '<div class="message error">No user found with that ID or password was already the same.</div>';
                }
            } else {
                $message = '<div class="message error">Error updating password. Please try again.</div>';
            }
            $stmt_update_password->close();
        } else {
            $message = '<div class="message error">A system error occurred. Please try again later.</div>';
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            object-fit: cover;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            color: #000;
        }
        .overlay {
            background: rgba(255, 255, 255, 0.85);
            min-height: 100vh;
            padding: 20px;
        }
        .panel {
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            margin-top: 20px;
        }
        .navbar-inverse {
            background-color: #003366;
            border-color: #002244;
        }
        .navbar-inverse .navbar-brand,
        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
        }
        .password-form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>

<video autoplay muted loop id="bg-video">
    <source src="photo/ab.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<div class="overlay">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Debre Birhan University</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <?php echo $message; ?>
                    <form action="" method="POST" class="password-form">
                        <div class="form-group">
                            <label for="student_id">Student ID</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo htmlspecialchars($loggedInStudentId); ?>" required readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required minlength="8">
                            <small class="form-text text-muted">Password must be at least 8 characters long</small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Password</button>
                        <a href="dashboard.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
