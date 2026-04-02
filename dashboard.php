<?php
session_start();

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="bg-dark p-3">
<a class="btn btn-light" href="#">Dashboard</a>
<a class="btn btn-danger" href="logout.php">Logout</a>
</div>

<div class="container mt-5 text-center">

<h2>Welcome</h2>

<?php if($_SESSION['role']=='teacher'){ ?>

<a class="btn btn-primary m-2" href="create_assignment.php">Create Assignment</a>
<a class="btn btn-info m-2" href="view_submissions.php">View Submissions</a>

<?php } else { ?>

<a class="btn btn-success m-2" href="submit_assignment.php">Submit Assignment</a>

<?php } ?>

</div>

</body>
</html>