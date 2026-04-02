<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f0f2f5;">

<div class="container col-md-4 mt-5 card p-4 shadow">

<h3 class="text-center">Login</h3>

<form method="POST">
<input class="form-control" name="email" placeholder="Enter Email" required>

<input class="form-control mt-3" type="password" name="password" placeholder="Enter Password" required>

<button class="btn btn-success mt-3 w-100" name="login">Login</button>
</form>

<br>
<a href="register.php" class="text-center">Create Account</a>

</div>

</body>
</html>

<?php
if(isset($_POST['login'])){

$q="SELECT * FROM users WHERE email='$_POST[email]'";
$res=mysqli_query($conn,$q);
$user=mysqli_fetch_assoc($res);

if($user && password_verify($_POST['password'],$user['password'])){

$_SESSION['user_id']=$user['id'];
$_SESSION['role']=$user['role'];
$_SESSION['branch']=$user['branch'];

header("Location: dashboard.php");

}else{
echo "<script>alert('Invalid Email or Password')</script>";
}
}
?>