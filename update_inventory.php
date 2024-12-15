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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inventoryId'])) {
    $inventoryId = $_POST['inventoryId'];
    $inventoryName = $_POST['inventoryName'];
    $inventoryQuantity = $_POST['inventoryQuantity'];

    try {
        $stmt = $pdo->prepare("UPDATE inventory SET item_name = :item_name, quantity = :quantity WHERE item_id = :item_id");
        $stmt->execute(['item_name' => $inventoryName, 'quantity' => $inventoryQuantity, 'item_id' => $inventoryId]);

        header('Location: update_inventory.php');
        exit;
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}

$stmt = $pdo->query("SELECT * FROM inventory");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/update\ in.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <script>
        function openUpdatePopup(inventoryId, name, quantity) {
            document.getElementById('inventoryId').value = inventoryId;
            document.getElementById('inventoryName').value = name;
            document.getElementById('inventoryQuantity').value = quantity;
            document.getElementById('updatePopup').classList.remove('hidden');
        }

        function cancelUpdate() {
            document.getElementById('updatePopup').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-900 bg-opacity-70 min-h-screen">
    <div class="container mx-auto py-8 px-4">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
        </div>

        <!-- Inventory List Table -->
        <div class="bg-white shadow-md rounded p-4">
            <h2 class="text-xl font-semibold mb-4">Inventory Management</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Inventory ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Quantity</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($item['item_id']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($item['item_name']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button onclick="openUpdatePopup('<?php echo $item['item_id']; ?>', '<?php echo htmlspecialchars($item['item_name']); ?>', '<?php echo $item['quantity']; ?>')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Update Popup -->
        <div id="updatePopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-md text-center">
                <p class="text-lg font-semibold mb-4">Update Inventory Record</p>
                <form method="POST" action="update_inventory.php">
                    <div class="mb-4">
                        <label for="inventoryId" class="block text-left font-medium">Inventory ID</label>
                        <input id="inventoryId" name="inventoryId" type="text" class="w-full border border-gray-300 px-4 py-2 rounded" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="inventoryName" class="block text-left font-medium">Name</label>
                        <input id="inventoryName" name="inventoryName" type="text" class="w-full border border-gray-300 px-4 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="inventoryQuantity" class="block text-left font-medium">Quantity</label>
                        <input id="inventoryQuantity" name="inventoryQuantity" type="number" class="w-full border border-gray-300 px-4 py-2 rounded" required>
                    </div>
                    <div class="flex justify-between">
                        <button type="button" onclick="cancelUpdate()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Success or Error Message -->
        <?php if (isset($message)): ?>
            <div class="bg-green-500 text-white p-4 rounded mt-4 text-center">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
