<?php
session_start();

if($_SESSION['role']!='teacher'){
    echo "Access Denied";
    exit;
}

include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f0f2f5;">

<!-- NAVBAR -->
<div class="bg-dark p-3">
    <a class="btn btn-light" href="dashboard.php">Dashboard</a>
    <a class="btn btn-danger" href="logout.php">Logout</a>
</div>

<!-- FORM -->
<div class="container mt-5 col-md-6 card p-4">

    <h3>Create Assignment</h3>

    <form method="POST" enctype="multipart/form-data">

        <!-- TITLE -->
        <label class="mt-2">Title</label>
        <input class="form-control" name="title" placeholder="Enter assignment title" required>

        <!-- DESCRIPTION -->
        <label class="mt-2">Description</label>
        <textarea class="form-control" name="description" placeholder="Enter assignment details"></textarea>

        <!-- DEADLINE -->
        <label class="mt-2">Deadline</label>
        <input class="form-control" type="datetime-local" name="deadline" required>

        <!-- BRANCH -->
        <label class="mt-2">Select Branch</label>
        <select class="form-control" name="branch" required>
            <option value="">-- Select Branch --</option>
            <option value="CSE">CSE</option>
            <option value="IT">IT</option>
            <option value="ECE">ECE</option>
            <option value="ME">ME</option>
        </select>

        <!-- FILE UPLOAD -->
        <label class="mt-2">Upload Assignment File (PDF only)</label>
        <input class="form-control" type="file" name="file" required>

        <!-- BUTTON -->
        <button class="btn btn-primary mt-3" name="submit">Create Assignment</button>

    </form>

</div>

</body>
</html>

<?php
if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $deadline = $_POST['deadline'];
    $branch = $_POST['branch'];
    $teacher_id = $_SESSION['user_id'];

    // FILE
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    // VALIDATION
    if($ext != "pdf"){
        echo "<script>alert('Only PDF files are allowed')</script>";
        exit;
    }

    // MOVE FILE
    move_uploaded_file($tmp, "uploads/".$file);

    // INSERT
    $q = "INSERT INTO assignments(title,description,deadline,teacher_id,branch,file)
          VALUES('$title','$desc','$deadline','$teacher_id','$branch','$file')";

    mysqli_query($conn,$q);

    echo "<script>alert('Assignment Created Successfully'); window.location='dashboard.php';</script>";
}
?>