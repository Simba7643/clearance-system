<?php
include 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Change Password - Debre Birhan University</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: #f5f5f5;
      padding-top: 50px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .change-password-box {
      max-width: 400px;
      margin: 0 auto;
      background: white;
      padding: 30px 40px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .change-password-box h2 {
      margin-bottom: 25px;
      text-align: center;
    }
    .btn-change {
      width: 100%;
      font-weight: bold;
      border-radius: 25px;
      padding: 10px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="change-password-box">
      <h2>Change Password</h2>
      <form action="changepassword2.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            placeholder="Enter your username"
            required
            autofocus
          />
        </div>
        <div class="form-group">
          <label for="newPassword">New Password</label>
          <input
            type="password"
            class="form-control"
            id="newPassword"
            name="newPassword"
            placeholder="Enter new password"
            required
            minlength="6"
          />
        </div>
        <button type="submit" class="btn btn-primary btn-change">Update Password</button>
      </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
