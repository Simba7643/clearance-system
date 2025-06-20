<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['studentId'])) {
    header("Location: loginStudent.php");
    exit;
}

$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];

$stmt = $conn->prepare("SELECT reason, days, type, date FROM student_penalties WHERE student_id = ?");
$stmt->bind_param("s", $studentId);
$stmt->execute();
$penalties = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard - Debre Birhan University</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Fullscreen video background */
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
        }

        .navbar-inverse {
            background-color: #003366;
            border-color: #002244;
        }

        .navbar-inverse .navbar-brand,
        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
        }

        .dashboard-btn {
            margin-top: 20px;
        }

        .penalty-box {
            margin-bottom: 15px;
            padding: 15px;
            border-left: 5px solid #0072ff;
            background: #f0f8ff;
        }

        .photo-feed {
            display: flex;
            gap: 25px;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .photo-item {
            width: 250px;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            background: white;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .photo-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            transition: transform 0.5s ease, filter 0.5s ease;
            border-radius: 10px 10px 0 0;
        }

        .photo-item p {
            margin-top: 8px;
            font-size: 16px;
            color: #222;
            font-weight: 600;
        }

        .photo-item:hover {
            transform: scale(1.15);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .photo-item:hover img {
            transform: scale(1.1);
            filter: brightness(1.1);
        }
    </style>
</head>
<body>

<!-- Background Video -->
<video autoplay muted loop id="bg-video">
    <source src="photo/ab.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<div class="overlay">

<!-- Navigation Bar -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Debre Birhan University</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="change_password.php"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<!-- Main Content -->
<div class="container">

    <div class="jumbotron">
        <h2>Welcome, <?php echo htmlspecialchars($studentName); ?> (ID: <?php echo htmlspecialchars($studentId); ?>)</h2>
        <p>This is your personal student dashboard. Stay informed and track your clearance status.</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">About DBU</div>
                <div class="panel-body">
                    <p>Debre Birhan University (DBU) is one of the prominent public universities in Ethiopia, known for academic excellence and vibrant student life.</p>
                    <ul>
                        <li>Established in 2007</li>
                        <li>Located in Amhara Region</li>
                        <li>Over 20,000 students</li>
                        <li>State-of-the-art libraries and labs</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">Latest News</div>
                <div class="panel-body">
                    <ul>
                        <li>🎓 Graduation scheduled for July 25, 2025</li>
                        <li>🧪 New research center launched</li>
                        <li>📚 Summer courses open for registration</li>
                        <li>🏅 Sports week kicks off next month</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo Feed -->
    <div class="col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">Campus Highlights</div>
            <div class="panel-body photo-feed">
                <div class="photo-item">
                    <img src="photo/q.png" alt="Campus 1" />
                    <p>Beautiful campus view</p>
                </div>
                <div class="photo-item">
                    <img src="photo/x.png" alt="Library" />
                    <p>Modern library facilities</p>
                </div>
                <div class="photo-item">
                    <img src="photo/f.png" alt="Sports" />
                    <p>Active sports programs</p>
                </div>
            </div>
        </div>
    </div>

    <!-- See Status Button -->
    <div class="text-center dashboard-btn">
        <button class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#statusSection">
            See Clearance Status
        </button>
    </div>

    <!-- Penalty Dashboard -->
    <div id="statusSection" class="collapse">
        <h3 class="text-center" style="margin-top: 30px;">Your Penalty Records</h3>

        <?php if ($penalties->num_rows > 0): ?>
            <?php while ($row = $penalties->fetch_assoc()): ?>
                <div class="penalty-box">
                    <p><strong>Reason:</strong> <?php echo htmlspecialchars($row['reason']); ?></p>
                    <p><strong>Days:</strong> <?php echo htmlspecialchars($row['days']); ?> day(s)</p>
                    <p><strong>Type:</strong> <?php echo htmlspecialchars($row['type']); ?></p>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($row['date']); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-success text-center">
                No penalties found. You are clear!
            </div>
        <?php endif; ?>
    </div>

</div>
</div> <!-- overlay -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
