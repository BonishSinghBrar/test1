<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * { box-sizing: border-box; }
    .navbar {
      overflow: hidden;
      background-color: #001f3f; /* Dark blue for the navbar */
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

    .container {
      max-width: 600px; /* Set a maximum width */
      margin: auto; /* Center the container */
      padding: 16px;
    }

    input[type=text], input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    .registerbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .registerbtn:hover {
      opacity: 1;
    }

    .form-container {
      width: 50%;
      margin: auto;
    }

    a {
      color: dodgerblue;
    }

    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }

    .error {
      color: #FF0000;
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
 <?php

$nameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = "";
$name = $email = $password = $address = $phone = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $valid = false;
  } else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
      $valid = false;
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $valid = false;
  } else {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $valid = false;
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $valid = false;
  } else {
    $password = test_input($_POST["password"]);

    
    if (!preg_match("/^[a-zA-Z\d@$!%*?&-']*$/", $password)) {
      $passwordErr = "Invalid password";
      $valid = false;
    }
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
    $valid = false;
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
    $valid = false;
  } else {
    $phone = test_input($_POST["phone"]);
    
    if (!preg_match("/^[0-9]*$/", $phone)) {
      $phoneErr = "Invalid phone number";
      $valid = false;
    }
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 style="text-align:center;">Banking App by BONISH</h2>

<div class="container" class="form-container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    Password: <input type="password" name="password" value="<?php echo $password; ?>">
    <span class="error"><?php echo $passwordErr; ?></span>
    <br><br>
    Address: <input type="text" name="address" value="<?php echo $address; ?>">
    <span class="error"><?php echo $addressErr; ?></span>
    <br><br>
    Phone Number: <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span class="error"><?php echo $phoneErr; ?></span>
    <br><br>
    <input type="submit" name="submit" class="registerbtn" value="Submit">
  </form>
</div>

<?php
if ($valid) {
  $servername = "localhost";
  $username = "root";
  $db_password = "";
  $dbname = "csd223_bonish";

  $conn = new mysqli($servername, $username, $db_password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO tbl_user(name, email, password, address, phone) VALUES ('$name', '$email', '$password', '$address', '$phone')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

    
    $name = $email = $password = $address = $phone = "";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $address;
echo "<br>";
echo $phone;
?>

<div class="footer">
  <p>Developed by Bonish Singh Brar</p>
</div>

</body>
</html>
