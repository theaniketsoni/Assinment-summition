<?php
session_start();
include 'db.php';

$id=$_GET['id'];
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container col-md-4 mt-5 card p-4">

<h3>Grade</h3>

<form method="POST">
<input class="form-control" name="marks" placeholder="Marks">
<textarea class="form-control mt-2" name="feedback"></textarea>

<button class="btn btn-primary mt-3" name="submit">Submit</button>
</form>

</div>

<?php
if(isset($_POST['submit'])){
$q="UPDATE submissions SET marks='$_POST[marks]',
feedback='$_POST[feedback]' WHERE id=$id";

mysqli_query($conn,$q);

echo "<script>alert('Graded'); window.location.href='view_submissions.php';</script>";
}
?>