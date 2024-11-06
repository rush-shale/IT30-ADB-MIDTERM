<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #f1f1f1;
            background-image: url("image/one\ piece\ anime.png"); /* Update with your image path */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* Navbar styles */
        .navbar {
            background-color: rgba(0, 0, 0, 0.8); /* Slight transparency */
            color: #f1f1f1;
            padding: 1em;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .logo {
            font-weight: bold;
            color: #f05454;
        }

        .navbar a {
            color: #f05454;
            margin-left: 1em;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #ffffff;
        }

        /* Container and button styles */
        .container {
            padding: 2em;
            max-width: 800px;
            margin: auto;
            background-color: rgba(18, 18, 18, 0.9); /* Semi-transparent background for readability */
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .button-container {
            margin-bottom: 20px;
        }

        button {
            background-color: #f05454;
            color: #f1f1f1;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff4e4e;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #1f1f1f;
            border: 1px solid #444;
            border-radius: 8px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            color: #f1f1f1;
        }

        th {
            background-color: #333;
            color: #f05454;
        }

        tr:nth-child(even) {
            background-color: #2b2b2b;
        }

        /* Hidden class */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<div class="navbar">
    <div class="logo">Alcohol POS</div>
    <div>
        <a href="history.php">History Log</a>
        <a href="dashboard.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <h1>Transaction History</h1>
    <div class="button-container">
        <button onclick="showTable('leftJoin')">Left Join</button>
        <button onclick="showTable('rightJoin')">Right Join</button>
        <button onclick="showTable('unionJoin')">Union Join</button>
    </div>

    <!-- Table for Left Join -->
    <div id="leftJoin" class="table-container">
        <h2>Left Join Transactions</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Payment</th>
                <th>Date</th>
            </tr>
            <?php foreach ($leftJoinTransactions as $transaction): ?>
                <tr>
                    <td><?php echo $transaction['id']; ?></td>
                    <td><?php echo $transaction['username'] ?? 'N/A'; ?></td>
                    <td><?php echo $transaction['product_name'] ?? 'N/A'; ?></td>
                    <td><?php echo $transaction['quantity']; ?></td>
                    <td><?php echo $transaction['total_amount']; ?></td>
                    <td><?php echo $transaction['payment']; ?></td>
                    <td><?php echo $transaction['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Table for Right Join -->
    <div id="rightJoin" class="table-container hidden">
        <h2>Right Join Transactions</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Payment</th>
                <th>Date</th>
            </tr>
            <?php foreach ($rightJoinTransactions as $transaction): ?>
                <tr>
                    <td><?php echo $transaction['id']; ?></td>
                    <td><?php echo $transaction['username'] ?? 'N/A'; ?></td>
                    <td><?php echo $transaction['product_name'] ?? 'N/A'; ?></td>
                    <td><?php echo $transaction['quantity']; ?></td>
                    <td><?php echo $transaction['total_amount']; ?></td>
                    <td><?php echo $transaction['payment']; ?></td>
                    <td><?php echo $transaction['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Table for Union Join -->
    <div id="unionJoin" class="table-container hidden">
        <h2>Union Join Transactions</h2>
        <table>
            <tr>
                <th>Transaction ID</th>
                <th>Username</th>
                <th>Total Amount</th>
            </tr>
            <?php foreach ($unionTransactions as $transaction): ?>
                <tr>
                    <td><?php echo $transaction['transaction_id'] ?? 'N/A'; ?></td>
                    <td><?php echo $transaction['username']; ?></td>
                    <td><?php echo $transaction['total_amount'] ?? 'N/A'; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<script>
    function showTable(tableName) {
        // Hide all table containers
        const tables = document.querySelectorAll('.table-container');
        tables.forEach(table => table.classList.add('hidden'));

        // Show the selected table
        document.getElementById(tableName).classList.remove('hidden');
    }

    showTable('leftJoin');
</script>

</body>
</html>
