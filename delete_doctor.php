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

if (isset($_GET['delete_doctor_id'])) {
    $doctor_id = $_GET['delete_doctor_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM appointments WHERE doctor_id = :doctor_id");
        $stmt->execute(['doctor_id' => $doctor_id]);

        $stmt = $pdo->prepare("DELETE FROM doctors WHERE doctor_id = :doctor_id");
        $stmt->execute(['doctor_id' => $doctor_id]);

        header("Location: delete_doctor.php");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

$stmt = $pdo->query("SELECT * FROM doctors");
$doctors = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/edit\ dc.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <script>
        let doctorIdToDelete = null;

        function showConfirmation(doctorId) {
            doctorIdToDelete = doctorId;
            const modal = document.getElementById('confirmationModal');
            modal.classList.remove('hidden');
        }

        function confirmDelete() {
            if (doctorIdToDelete !== null) {
                window.location.href = 'delete_doctor.php?delete_doctor_id=' + doctorIdToDelete;
            }
        }

        function closeConfirmation() {
            const modal = document.getElementById('confirmationModal');
            modal.classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-900 bg-opacity-70 min-h-screen">
    <div class="container mx-auto py-8 px-4">
        <div class="mb-4">
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
        </div>

        <div class="bg-white shadow-md rounded p-4">
            <h2 class="text-xl font-semibold mb-4">Doctor List</h2>
            <?php if (count($doctors) == 0): ?>
                <p class="text-center text-lg text-gray-500">No doctors available.</p>
            <?php else: ?>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Doctor ID</th>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Designation</th>
                            <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($doctor['doctor_id']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($doctor['name']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($doctor['designation']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($doctor['phone']); ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button onclick="showConfirmation(<?php echo $doctor['doctor_id']; ?>)" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <!-- Confirmation Modal -->
        <div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-md text-center">
                <p class="text-lg font-semibold mb-4">Are you sure you want to delete this doctor?</p>
                <div class="flex justify-center space-x-4">
                    <button onclick="confirmDelete()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Confirm</button>
                    <button onclick="closeConfirmation()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
