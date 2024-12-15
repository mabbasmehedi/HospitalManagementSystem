<?php
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

if (isset($_GET['staff_id'])) {
    $staffId = $_GET['staff_id'];

    $stmt = $pdo->prepare("DELETE FROM staff WHERE staff_id = :staff_id");
    $stmt->execute(['staff_id' => $staffId]);

    header("Location: delete_staff.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM staff");
$staffList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/st\ lisst.jpg'); /* Replace with the actual image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <script>
        function showConfirmDelete(staffId) {
            document.getElementById('confirmDeletePopup').classList.remove('hidden');
            document.getElementById('confirmDeleteButton').onclick = function() {
                window.location.href = "delete_staff.php?staff_id=" + staffId; // Proceed with deletion
            };
        }

        function hideConfirmDelete() {
            document.getElementById('confirmDeletePopup').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-900 bg-opacity-70 min-h-screen">
    <div class="container mx-auto py-8 px-4">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
        </div>

        <!-- Success Message -->
        <?php if (isset($_GET['message'])): ?>
            <div class="text-green-500 text-center mb-4">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <!-- Staff List Table -->
        <div class="bg-white shadow-md rounded p-4">
            <h2 class="text-xl font-semibold mb-4">Staff List</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Staff ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Role</th>
                        <th class="border border-gray-300 px-4 py-2">Shift</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staffList as $staff): ?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($staff['staff_id']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($staff['name']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($staff['role']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($staff['shift']); ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button onclick="showConfirmDelete(<?php echo $staff['staff_id']; ?>)" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Confirmation Delete Popup -->
        <div id="confirmDeletePopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-md text-center">
                <p class="text-lg font-semibold mb-4">Are you sure you want to delete this staff member?</p>
                <div class="flex justify-center space-x-4">
                    <button id="confirmDeleteButton" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Confirm</button>
                    <button onclick="hideConfirmDelete()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                </div>
            </div>
        </div>

    </div>
</body>
</html>