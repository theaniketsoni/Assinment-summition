<?php
session_start();

if($_SESSION['role']!='teacher'){
    echo "Access Denied";
    exit;
}

include 'db.php';

// UPDATE MARKS + STATUS
if(isset($_POST['grade'])){

    $id = $_POST['id'];
    $marks = $_POST['marks'];

    $q = "UPDATE submissions SET marks='$marks', status='Checked' WHERE id='$id'";
    mysqli_query($conn,$q);

    header("Location: view_submissions.php");
    exit;
}

// FETCH DATA
$q = "SELECT s.*, u.email, a.title 
      FROM submissions s
      JOIN users u ON s.student_id=u.id
      JOIN assignments a ON s.assignment_id=a.id";

$data = mysqli_query($conn,$q);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Submissions</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f0f2f5;">

<div class="bg-dark p-3">
<a class="btn btn-light" href="dashboard.php">Dashboard</a>
<a class="btn btn-danger" href="logout.php">Logout</a>
</div>

<div class="container mt-5">

<h3>Submissions</h3>

<table class="table table-bordered">

<tr>
<th>Student</th>
<th>Assignment</th>
<th>File</th>
<th>Status</th>
<th>Marks</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>
<td><?= $row['email'] ?></td>
<td><?= $row['title'] ?></td>

<td>
<a href="uploads/<?= $row['file'] ?>" target="_blank">View</a>
</td>

<td>
<?php if($row['status']=='Checked'){ ?>
<span class="badge bg-success">Checked</span>
<?php } else { ?>
<span class="badge bg-warning">Pending</span>
<?php } ?>
</td>

<td><?= $row['marks'] ?></td>

<td>
<form method="POST">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<input class="form-control mb-1" type="number" name="marks" placeholder="Enter Marks" required>

<button class="btn btn-primary btn-sm" name="grade">Submit</button>

</form>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>