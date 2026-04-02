<?php
session_start();

if($_SESSION['role']!='student'){
    echo "Access Denied";
    exit;
}

include 'db.php';

$student_id = $_SESSION['user_id'];
$branch = $_SESSION['branch'];

// FETCH ALL ASSIGNMENTS OF BRANCH
$q = "SELECT * FROM assignments WHERE branch='$branch'";
$assignments = mysqli_query($conn,$q);
?>

<!DOCTYPE html>
<html>
<head>
<title>Submit Assignment</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f0f2f5;">

<!-- NAVBAR -->
<div class="bg-dark p-3">
<a class="btn btn-light" href="dashboard.php">Dashboard</a>
<a class="btn btn-danger" href="logout.php">Logout</a>
</div>

<div class="container mt-5">

<h3>Assignments</h3>

<table class="table table-bordered">

<tr>
<th>Title</th>
<th>Description</th>
<th>Deadline</th>
<th>File</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($a=mysqli_fetch_assoc($assignments)){ 

// CHECK IF SUBMITTED
$check = mysqli_query($conn,
"SELECT * FROM submissions WHERE student_id='$student_id' AND assignment_id='{$a['id']}'");

$submitted = mysqli_num_rows($check) > 0;
?>

<tr>

<td><?= $a['title'] ?></td>
<td><?= $a['description'] ?></td>
<td><?= $a['deadline'] ?></td>

<td>
<a href="uploads/<?= $a['file'] ?>" target="_blank">Download</a>
</td>

<td>
<?php if($submitted){ ?>
<span class="badge bg-success">Submitted</span>
<?php } else { ?>
<span class="badge bg-warning">Pending</span>
<?php } ?>
</td>

<td>

<?php if(!$submitted){ ?>

<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="assignment_id" value="<?= $a['id'] ?>">

<input class="form-control mb-1" type="file" name="file" required>

<button class="btn btn-success btn-sm" name="submit">Upload</button>
</form>

<?php } else { ?>

<button class="btn btn-secondary btn-sm" disabled>Already Submitted</button>

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>

<?php
// HANDLE SUBMISSION
if(isset($_POST['submit'])){

$assignment_id = $_POST['assignment_id'];

// CHECK AGAIN (SECURITY)
$check = mysqli_query($conn,
"SELECT * FROM submissions WHERE student_id='$student_id' AND assignment_id='$assignment_id'");

if(mysqli_num_rows($check)>0){
    echo "<script>alert('Already Submitted')</script>";
    exit;
}

$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

move_uploaded_file($tmp, "uploads/".$file);

$q = "INSERT INTO submissions(student_id,assignment_id,file,status)
VALUES('$student_id','$assignment_id','$file','Pending')";

mysqli_query($conn,$q);

echo "<script>alert('Submitted Successfully'); window.location='submit_assignment.php';</script>";
}
?>