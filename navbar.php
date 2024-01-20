<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banking App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        /* Your custom styles go here */
        .red {
            color: red;
        }

        .hero-area {
            min-height: 800px;
        }

        .hero-area h1 {
            padding: 300px;
        }

        .footer {
            min-height: 100px;
            color: white;
            padding: 30px;
            background-color: black;
        }

        .mynav {
            background-color: red !important;
            color: black !important;
        }

        .mynav a {
            background-color: red !important;
            color: black !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary mynav">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Banking App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Signup</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>