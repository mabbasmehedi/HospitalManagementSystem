<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorId = $_POST['doctor_id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO doctors (doctor_id, name, designation, phone) 
            VALUES ('$doctorId', '$name', '$designation', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/doctors.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <!-- Main container for the form -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Add Doctor</h1>
        
        <!-- Form begins here -->
        <form class="space-y-4" method="POST" action="">
            <!-- Doctor ID input -->
            <div>
                <label for="doctor_id" class="block text-gray-700 font-bold mb-2">Doctor ID</label>
                <input type="number" id="doctor_id" name="doctor_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter doctor ID" required>
            </div>
            
            <!-- Doctor Name input -->
            <div>
                <label for="name" class="block text-gray-700 font-bold mb-2">Doctor Name</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter doctor name" required>
            </div>
            
            <!-- Doctor Designation input -->
            <div>
                <label for="designation" class="block text-gray-700 font-bold mb-2">Doctor Designation</label>
                <input type="text" id="designation" name="designation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter doctor designation" required>
            </div>
            
            <!-- Doctor Phone input -->
            <div>
                <label for="phone" class="block text-gray-700 font-bold mb-2">Doctor Phone Number</label>
                <input type="text" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter doctor's phone number" required>
            </div>
            
            <!-- Submit and Cancel buttons -->
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
