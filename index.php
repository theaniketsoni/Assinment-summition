<!DOCTYPE html>
<html>
<head>
    <title>Assignment Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body{
            margin:0;
            font-family: 'Poppins', sans-serif;
            scroll-behavior:smooth;
        }

        /* NAVBAR */
        .navbar{
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .navbar a{
            color:white !important;
            margin-right:10px;
        }

        /* HERO */
        .hero{
            height:90vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
        }

        .hero h1{
            font-size:50px;
        }

        .btn-custom{
            border-radius:30px;
            padding:10px 25px;
        }

        /* SECTIONS */
        section{
            padding:60px 20px;
            text-align:center;
        }

        .about{
            background:#f8f9fa;
        }

        .features{
            background:white;
        }

        .contact{
            background:#f8f9fa;
        }

        .feature-box{
            padding:20px;
            transition:0.3s;
        }

        .feature-box:hover{
            transform:scale(1.05);
        }

        /* FOOTER */
        .footer{
            background:#111;
            color:#aaa;
            padding:15px;
            text-align:center;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark px-4">
    <a class="navbar-brand" href="#">📚 AMS</a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>

            <!-- ✅ SAME COLOR BUTTONS -->
            <li class="nav-item">
                <a class="btn btn-info btn-sm" href="login.php">Login</a>
            </li>

            <li class="nav-item">
                <a class="btn btn-info btn-sm ms-2" href="register.php">Register</a>
            </li>

        </ul>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div>
        <h1>Assignment Management System</h1>
        <p>Smart way to manage assignments online</p>

        <a href="login.php" class="btn btn-info btn-custom mt-3">Get Started</a>
    </div>
</div>

<!-- ABOUT -->
<section id="about" class="about">
    <h2>About</h2>
    <p>This system helps teachers create assignments and students submit them online efficiently.</p>
</section>

<!-- FEATURES -->
<section id="features" class="features">
    <h2>Features</h2>

    <div class="row justify-content-center">

        <div class="col-md-3 feature-box">
            <i class="fa fa-user fa-2x mb-2"></i>
            <h5>Role Based</h5>
            <p>Separate dashboard for teacher and student.</p>
        </div>

        <div class="col-md-3 feature-box">
            <i class="fa fa-file fa-2x mb-2"></i>
            <h5>Assignments</h5>
            <p>Create and manage assignments easily.</p>
        </div>

        <div class="col-md-3 feature-box">
            <i class="fa fa-upload fa-2x mb-2"></i>
            <h5>Submission</h5>
            <p>Upload assignments online.</p>
        </div>

    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="contact">
    <h2>Contact</h2>
    <p>Email: yourname@email.com</p>
    <p>Phone: +91 1234567890</p>
</section>

<!-- FOOTER -->
<div class="footer">
    © 2026 Assignment Management System
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



<!-- <!DOCTYPE html>
<html>
<head>
    <title>Assignment Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(to right, #4facfe, #00f2fe);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .card{
            padding:40px;
            border-radius:15px;
            text-align:center;
        }
    </style>
</head>

<body>

<div class="card shadow col-md-5">

<h1 class="mb-3">📚 Assignment Management System</h1>

<p>
Manage assignments easily. Teachers create assignments and students submit based on their branch.
</p>

<hr>

<a href="login.php" class="btn btn-primary w-100 mb-2">Login</a>
<a href="register.php" class="btn btn-success w-100">Register</a>

</div>

</body>
</html> -->