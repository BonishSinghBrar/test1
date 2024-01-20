<?php

class BankAccount {
    private $balance;
    private $transactionHistory;

    public function __construct($initialBalance = 0) {
        $this->balance = $initialBalance;
        $this->transactionHistory = [];
    }

    public function deposit($amount) {
        $this->balance += $amount;
        $this->recordTransaction('Deposit', $amount);
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $this->recordTransaction('Withdrawal', $amount);
        } else {
            echo "Insufficient funds. Cannot withdraw $amount.\n";
        }
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getTransactionHistory() {
        return $this->transactionHistory;
    }

    private function recordTransaction($type, $amount) {
        $this->transactionHistory[] = [
            'type' => $type,
            'amount' => $amount,
            'balance' => $this->balance,
        ];
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csd223_bonish";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
    $amount = isset($_POST['amount']) ? $_POST['amount'] : 0;

    if (isset($_POST['deposit'])) {
        $sql = "INSERT INTO tbl_account (user_id, deposit, withdraw, balance) VALUES ($userId, $amount, 0, 0)";
    } elseif (isset($_POST['withdraw'])) {
        $sql = "INSERT INTO tbl_account (user_id, deposit, withdraw, balance) VALUES ($userId, 0, $amount, 0)";
    }

    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        body {background-color: #f2f2f2; margin: 0; font-family: Arial, sans-serif;}
        .navbar {
            overflow: hidden;
            background-color: #333;
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
            background-color: #ddd;
            color: black;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffe5e5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }
        h1 {color: #333;}
        table {width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}
        th {background-color: #4CAF50; color: white;}
    </style>
</head>
<body>

<div class="navbar">
    <a href="Dashboard.php">Home</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
    <a href="#">Sign In</a>
    <a href="index.php">Sign Up</a>
</div>

<div class="container">
    <h1>Deposit or Withdraw</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" required>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required>
        <button type="submit" name="deposit">Deposit</button>
        <button type="submit" name="withdraw">Withdraw</button>
    </form>

    <h1>Transaction History</h1>

    <?php
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
    $sql = "SELECT * FROM tbl_account WHERE user_id = $userId";
    $result = $conn->query($sql);
    ?>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $runningBalance = 0;
                while ($row = $result->fetch_assoc()):
                    $runningBalance += ($row['deposit'] - $row['withdraw']);
                ?>
                    <tr>
                        <td><?= $row['deposit'] > 0 ? 'Deposit' : 'Withdrawal' ?></td>
                        <td>$<?= abs($row['deposit'] + $row['withdraw']) ?></td>
                        <td>$<?= $runningBalance ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No transaction history available for this account.</p>
    <?php endif; ?>
</div>

<?php
$conn->close();
?>

</body>
</html>
