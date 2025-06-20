<?php include 'dbconn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Penalty Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    body {
      padding: 20px;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background-color: #f2f2f2;
    }
    h2, h3 {
      margin-bottom: 20px;
    }
    .section {
      margin-bottom: 40px;
      padding: 20px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    table {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<!-- Admin Navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Dashboard</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="changePassword.php"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
      <li><a href="#"><img src="photo/a.JPEG" alt="Admin Profile" style="width:30px;height:30px;border-radius:50%;margin-right:5px;"> Admin</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success text-center">
      <?php echo htmlspecialchars($_GET['msg']); ?>
    </div>
  <?php endif; ?>

  <h2>Penalty Management</h2>

  <!-- Add Student & Penalty Section -->
  <div class="section">
    <h3>Add Student / Add Penalty</h3>

    <!-- Student Info Form -->
    <form method="POST" action="adminChart3.php"> <!-- Default: Add Penalty -->
      <div class="row">
        <div class="form-group col-md-4">
          <label for="studentName">Student Name:</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
          <label for="studentId">Student ID:</label>
          <input type="text" name="student_id" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
          <label for="department">Department:</label>
          <select name="department" class="form-control" required>
            <option value="">-- Select Department --</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Business">Business</option>
            <option value="Engineering">Engineering</option>
            <option value="Biology">Biology</option>
            <option value="Arts">Arts</option>
            <option value="Natural Resource">Natural Resource</option>
            <option value="Sport Science">Sport Science</option>
          </select>
        </div>
      </div>

      <hr>

      <!-- Penalty Info -->
      <div class="row">
        <div class="form-group col-md-4">
          <label for="reason">Penalty Reason:</label>
          <input type="text" name="reason" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label for="days">Number of Days (optional):</label>
          <input type="number" name="days" class="form-control" min="1">
        </div>
        <div class="form-group col-md-4">
          <label for="type">Penalty Type:</label>
          <select name="type" class="form-control">
            <option value="">-- Select Type --</option>
            <option value="Dormitory">Dormitory</option>
            <option value="Bookstore">Bookstore</option>
            <option value="Library">Library</option>
            <option value="Cafeteria">Cafeteria</option>
            <option value="Others">Others</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label for="date">Penalty Date:</label>
          <input type="date" name="date" class="form-control">
        </div>

        <div class="form-group col-md-4">
          <label>&nbsp;</label>
          <button type="submit" class="btn btn-success form-control">Add student only</button>
        </div>

        <div class="form-group col-md-4">
          <label>&nbsp;</label>
          <button formaction="adminChart3.php" class="btn btn-danger form-control">add penality</button>
        </div>
         <div class="form-group col-md-4">
          <label>&nbsp;</label>
          <button formaction="adminChart3.php" class="btn btn-danger form-control">delete  penality</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
