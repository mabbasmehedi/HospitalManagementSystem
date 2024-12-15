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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = trim($_POST['patient_id']);
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $diagnosis = trim($_POST['diagnosis']);

    $sql = "INSERT INTO patients (patient_id, name, age, gender, diagnosis) VALUES (:patient_id, :name, :age, :gender, :diagnosis)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            'patient_id' => $patient_id,
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'diagnosis' => $diagnosis
        ]);
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/add\ patient.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Add Patient</h1>
        <?php if (!empty($message)): ?>
            <div class="text-red-500 text-center mb-4"><?php echo $message; ?></div>
        <?php endif; ?>
        <form class="space-y-4" method="POST" action="">
            <div>
                <label for="patient_id" class="block text-gray-700 font-bold mb-2">Patient ID</label>
                <input type="number" name="patient_id" id="patient_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter patient ID" required>
            </div>
            <div>
                <label for="name" class="block text-gray-700 font-bold mb-2">Patient Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter patient name" required>
            </div>
            <div>
                <label for="age" class="block text-gray-700 font-bold mb-2">Patient Age</label>
                <input type="number" name="age" id="age" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter patient age" required>
            </div>
            <div>
                <label for="gender" class="block text-gray-700 font-bold mb-2">Patient Gender</label>
                <select name="gender" id="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled selected>Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label for="diagnosis" class="block text-gray-700 font-bold mb-2">Patient Diagnosis</label>
                <input type="text" name="diagnosis" id="diagnosis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter patient diagnosis" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
                <button type="button" onclick="window.location.href='index.php';" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</body>
</html>
