<!DOCTYPE html>
<html>

<head>
    <style>
        .navbar {
            overflow: hidden;
            background-color: #001f3f; /* Dark blue for the navbar */
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #003366; /* Darker blue on hover */
            color: black;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffcc; /* Light yellow overall background */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin-top: 60px; /* Adjusted to leave space for the fixed navbar */
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            padding: 15px 30px; /* Increased padding for larger buttons */
            font-size: 20px; /* Increased font size for larger buttons */
            background-color: #001f3f; /* Dark blue for buttons */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0; /* Added margin for spacing between buttons */
        }

        button:hover {
            background-color: #003366; /* Darker blue on hover */
        }

        /* Footer styles */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #001f3f; /* Dark blue for the footer */
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="Dashboard.php">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="index.php">Sign Up</a>
    </div>

    <h2>Welcome to my Banking Application</h2>

    <form action="index.php" method="get">
        <button type="submit">Sign up</button>
    </form>

    <form action="view.php" method="get">
        <button type="submit">View</button>
    </form>

    <form action="deposit.php" method="get">
        <button type="submit">Transactions</button>
    </form>

    <div class="footer">
        <p>Developed by Bonish Singh Brar</p>
    </div>

</body>

</html>
