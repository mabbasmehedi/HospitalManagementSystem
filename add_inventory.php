<?php
// Database connection
$host = 'localhost';
$db = 'hospital_management';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $quantity = $_POST['quantity'];

    try {

        $stmt = $pdo->prepare("INSERT INTO inventory (item_id, item_name, quantity) VALUES (:item_id, :item_name, :quantity)");
        $stmt->execute(['item_id' => $itemId, 'item_name' => $itemName, 'quantity' => $quantity]);

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/inventories.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <!-- Main container for the form -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Add Inventory Item</h1>
        
        <!-- Form begins here -->
        <form class="space-y-4" method="POST" action="add_inventory.php">
            <!-- Item ID input -->
            <div>
                <label for="itemId" class="block text-gray-700 font-bold mb-2">Item ID</label>
                <input type="number" name="itemId" id="itemId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter item ID" required>
            </div>
            
            <!-- Item Name input -->
            <div>
                <label for="itemName" class="block text-gray-700 font-bold mb-2">Item Name</label>
                <input type="text" name="itemName" id="itemName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter item name" required>
            </div>
            
            <!-- Item Quantity input -->
            <div>
                <label for="quantity" class="block text-gray-700 font-bold mb-2">Item Quantity</label>
                <input type="number" name="quantity" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter item quantity" required>
            </div>
            
            <!-- Submit and Cancel buttons -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
                <button type="button" onclick="goBack()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <!-- Script for form submission and navigation -->
    <script>
        function goBack() {
            window.location.href = "index.php";
        }
    </script>
</body>
</html>
