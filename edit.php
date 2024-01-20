<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "csd223_bonish";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM tbl_user WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display a form with pre-filled data for editing
        echo '<form action="update.php" method="post">
                  <input type="hidden" name="id" value="' . $row["id"] . '">
                  Name: <input type="text" name="name" value="' . $row["name"] . '"><br>
                  Email: <input type="text" name="email" value="' . $row["email"] . '"><br>
                  
                  <input type="submit" value="Update">
              </form>';
    } else {
        echo "Record not found.";
    }
}

$conn->close();
?>
