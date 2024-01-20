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

    $sql = "DELETE FROM tbl_user WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully. <a href='view.php'>Back to View</a>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
