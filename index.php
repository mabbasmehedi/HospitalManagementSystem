<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./images/Dashboard.jpg');
            background-size: 700px 800px;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white py-4 shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl ml-4 font-bold">Admin Dashboard</h1>
                <button onclick="logout()" class="bg-red-500 hover:bg-red-600 px-4 py-2 mr-4 rounded">Logout</button>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto py-8 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Add Patient -->
                <button onclick="navigateTo('add_patient.php')" class="bg-green-500 text-white p-4 rounded shadow hover:bg-green-600">
                    Add Patient
                </button>

                <!-- Add Staff -->
                <button onclick="navigateTo('add_staff.php')" class="bg-blue-500 text-white p-4 rounded shadow hover:bg-blue-600">
                    Add Staff
                </button>

                <!-- Add Doctor -->
                <button onclick="navigateTo('add_doctor.php')" class="bg-indigo-500 text-white p-4 rounded shadow hover:bg-indigo-600">
                    Add Doctor
                </button>

                <!-- Add Inventory -->
                <button onclick="navigateTo('add_inventory.php')" class="bg-yellow-500 text-white p-4 rounded shadow hover:bg-yellow-600">
                    Add Inventory
                </button>

                <!-- Delete Patient -->
                <button onclick="navigateTo('delete_patient.php')" class="bg-red-500 text-white p-4 rounded shadow hover:bg-red-600">
                    Delete Patient
                </button>

                <!-- Delete Staff -->
                <button onclick="navigateTo('delete_staff.php')" class="bg-pink-500 text-white p-4 rounded shadow hover:bg-pink-600">
                    Delete Staff
                </button>

                <!-- Delete Doctor -->
                <button onclick="navigateTo('delete_doctor.php')" class="bg-orange-500 text-white p-4 rounded shadow hover:bg-orange-600">
                    Delete Doctor
                </button>

                <!-- Update Inventory -->
                <button onclick="navigateTo('update_inventory.php')" class="bg-blue-700 text-white p-4 rounded shadow hover:bg-blue-800">
                    Update Inventory
                </button>

                <!-- Show All Information -->
                <button onclick="navigateTo('show_all_information.php')" class="bg-gray-500 text-white p-4 rounded shadow hover:bg-gray-600">
                    Show All Information
                </button>

            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Hospital Management System</p>
            </div>
        </footer>
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }

        function logout() {
            alert("Logging out...");
            window.location.href = "Home.php";
        }
    </script>
</body>
</php>
