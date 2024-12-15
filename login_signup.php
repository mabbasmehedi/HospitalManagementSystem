<?php
session_start();

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

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $username;
            header('Location: index.php');
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/log\ in.avif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto mt-10">
        <!-- Admin Login Section -->
        <div class="bg-white rounded shadow p-6 max-w-md mx-auto">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Admin Login</h2>
            <?php if ($error): ?>
                <div class="text-red-500 text-center mb-4"> <?php echo $error; ?> </div>
            <?php endif; ?>
            <form class="space-y-4" method="POST" action="">
                <div>
                    <label for="username" class="block text-gray-600">Username</label>
                    <input type="text" name="username" id="username" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div>
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <button type="submit" name="login" class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600 w-full">Login</button>
            </form>
        </div>
    </main>
</body>
</html>
