<?php
// Database connection
$host = 'localhost';  // Replace with your database host
$db = 'hospital_management';  // Database name
$user = 'root';  // Replace with your database username
$pass = '';  // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffId = $_POST['staffId'];
    $staffName = $_POST['staffName'];
    $staffRole = $_POST['staffRole'];
    $staffShift = $_POST['staffShift'];

    // Insert the staff data into the database
    $stmt = $pdo->prepare("INSERT INTO staff (staff_id, name, role, shift) VALUES (:staff_id, :name, :role, :shift)");
    $stmt->execute([
        'staff_id' => $staffId,
        'name' => $staffName,
        'role' => $staffRole,
        'shift' => $staffShift
    ]);

    echo "<script> window.location.href = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/Staffs.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <!-- Main container for the form -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Add Staff</h1>
        
        <!-- Form begins here -->
        <form action="add_staff.php" method="POST" class="space-y-4">
            <!-- Staff ID input -->
            <div>
                <label for="staffId" class="block text-gray-700 font-bold mb-2">Staff ID</label>
                <input type="number" name="staffId" id="staffId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter staff ID" required>
            </div>
            
            <!-- Staff Name input -->
            <div>
                <label for="staffName" class="block text-gray-700 font-bold mb-2">Staff Name</label>
                <input type="text" name="staffName" id="staffName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter staff name" required>
            </div>
            
            <!-- Staff Role input -->
            <div>
                <label for="staffRole" class="block text-gray-700 font-bold mb-2">Staff Role</label>
                <input type="text" name="staffRole" id="staffRole" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter staff role" required>
            </div>
            
            <!-- Staff Shift dropdown -->
            <div>
                <label for="staffShift" class="block text-gray-700 font-bold mb-2">Staff Shift</label>
                <select name="staffShift" id="staffShift" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled selected>Select Shift</option>
                    <option value="Day">Day</option>
                    <option value="Night">Night</option>
                </select>
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
            alert("Returning to previous page...");
            window.history.back();
        }
    </script>
</body>
</html>
