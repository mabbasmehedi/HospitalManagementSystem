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

if (isset($_GET['delete_patient_id'])) {
    $patient_id = $_GET['delete_patient_id'];

    $stmt = $pdo->prepare("DELETE FROM appointments WHERE patient_id = :patient_id");
    $stmt->execute(['patient_id' => $patient_id]);

    $stmt = $pdo->prepare("DELETE FROM patients WHERE patient_id = :patient_id");
    $stmt->execute(['patient_id' => $patient_id]);

    header("Location: delete_patient.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM patients");
$patients = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/p\ list.jpg'); /* Replace with the actual image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <script>
        let patientIdToDelete = null;

        function showConfirmation(patientId) {
            patientIdToDelete = patientId;
            const modal = document.getElementById('confirmationModal');
            modal.classList.remove('hidden');
        }

        function confirmDelete() {
            if (patientIdToDelete !== null) {
                window.location.href = 'delete_patient.php?delete_patient_id=' + patientIdToDelete;
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
        <!-- Back Button -->
        <div class="mb-4">
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
        </div>

        <!-- Patient List Table -->
        <div class="bg-white shadow-md rounded p-4">
            <h2 class="text-xl font-semibold mb-4">Patient List</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Patient ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Age</th>
                        <th class="border border-gray-300 px-4 py-2">Gender</th>
                        <th class="border border-gray-300 px-4 py-2">Diagnosis</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($patient['patient_id']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($patient['name']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($patient['age']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($patient['gender']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($patient['diagnosis']); ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button onclick="showConfirmation(<?php echo $patient['patient_id']; ?>)" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Confirmation Modal -->
        <div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-md text-center">
                <p class="text-lg font-semibold mb-4">Are you sure you want to delete this patient?</p>
                <div class="flex justify-center space-x-4">
                    <button onclick="confirmDelete()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Confirm</button>
                    <button onclick="closeConfirmation()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
