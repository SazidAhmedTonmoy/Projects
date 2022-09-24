<!DOCTYPE html>
<html lang="en">
<head>
    <title>NSU Internship Management System</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="header/style.css">
</head>
<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo/Logo.png" class="w-100 main-logo" alt="Logo" title="Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about-us.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                        <li>
                            <div class="btn-group">
                               <button type="button" class="btn btn-danger">Login</button>
                               <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="sr-only">Toggle Dropdown</span></button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="student-dashboard/login.php">Student Login</a>
                                <a class="dropdown-item" href="company-dashboard/login.php">Company Login</a>
                                <a class="dropdown-item" href="admin/login.php">Admin Login</a>
                            </div>
                        </li>
                        <li>
                            <div class="btn-group">
                               <button type="button" class="btn btn-danger">Registration</button>
                               <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="sr-only">Toggle Dropdown</span></button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="student-registration.php">Student Registration</a>
                                <a class="dropdown-item" href="company-registration.php">Company Registration</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>