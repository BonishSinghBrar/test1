<!DOCTYPE html>
<html>

<head>
    <style>
        .navbar {
            overflow: hidden;
            background-color: #001f3f; /* Dark blue color for the navbar */
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
            background-color: #ddd; /* Background color on hover */
            color: black;
        }

        /* Footer styles */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #001f3f; /* Dark blue color for the footer */
            color: white;
            text-align: center;
            padding: 10px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .edit-btn,
        .delete-btn {
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
        }

        .edit-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="dashboard.php">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">signin</a>
        <a href="index.php">signup</a>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "csd223_bonish";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, email, phone, address FROM tbl_user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table id="customers">';
        echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Action</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["name"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>' . $row["phone"] . '</td>';
            echo '<td>' . $row["address"] . '</td>';
            echo '<td>
                  <a class="edit-btn" href="edit.php?id=' . $row["id"] . '">Edit</a>
                  <a class="delete-btn" href="delete.php?id=' . $row["id"] . '">Delete</a>
                  </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<h2 class="no-results">0 results</h2>';
    }

    $conn->close();
    ?>

    <div class="footer">
        <p>&copy; 2024 By BONISH. All rights reserved.</p>
    </div>

</body>

</html>
