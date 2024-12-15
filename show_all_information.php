<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patients_query = "SELECT * FROM patients";
$patients_result = $conn->query($patients_query);

$staff_query = "SELECT * FROM staff";
$staff_result = $conn->query($staff_query);

$doctors_query = "SELECT * FROM doctors";
$doctors_result = $conn->query($doctors_query);

$inventory_query = "SELECT * FROM inventory";
$inventory_result = $conn->query($inventory_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/5006163.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
        </div>

        <!-- Patient Table -->
        <div class="bg-white shadow-md rounded p-4 mb-8">
            <h2 class="text-xl font-semibold mb-4">Patient Information</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Patient ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Age</th>
                        <th class="border border-gray-300 px-4 py-2">Gender</th>
                        <th class="border border-gray-300 px-4 py-2">Diagnosis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $patients_result->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['patient_id']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['name']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['age']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['gender']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['diagnosis']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Staff Table -->
        <div class="bg-white shadow-md rounded p-4 mb-8">
            <h2 class="text-xl font-semibold mb-4">Staff Information</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Staff ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Role</th>
                        <th class="border border-gray-300 px-4 py-2">Shift</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $staff_result->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['staff_id']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['name']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['role']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['shift']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Doctors Table -->
        <div class="bg-white shadow-md rounded p-4 mb-8">
            <h2 class="text-xl font-semibold mb-4">Doctor Information</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Doctor ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Designation</th>
                        <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $doctors_result->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['doctor_id']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['name']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['designation']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $row['phone']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>



    <!-- Inventory Table -->
    <div class="bg-white shadow-md rounded p-4 mb-8">
            <h2 class="text-xl font-semibold mb-4">Inventory</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Inventory ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any rows in the inventory
                    if ($inventory_result->num_rows > 0) {
                        // Loop through the inventory items and display them
                        while ($row = $inventory_result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item_id'] . "</td>"; // Adjusted column name
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item_name'] . "</td>"; // Adjusted column name
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['quantity'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // If no inventory data is found
                        echo "<tr><td colspan='3' class='border border-gray-300 px-4 py-2 text-center'>No inventory data available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>