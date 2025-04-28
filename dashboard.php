<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="flex">

    <!-- Sidebar -->
    <div class="w-64 h-screen bg-white shadow-md">
        <div class="p-6 text-2xl font-bold text-blue-600">
            Admin
        </div>
        <nav class="mt-10">
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-100 text-gray-700">Dashboard</a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-100 text-gray-700">Products</a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-100 text-gray-700">Orders</a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-100 text-gray-700">Customers</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Sales</h2>
                <p class="text-2xl font-bold text-green-600">$12,345</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Orders</h2>
                <p class="text-2xl font-bold text-blue-600">1,234</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Customers</h2>
                <p class="text-2xl font-bold text-purple-600">567</p>
            </div>

        </div>

        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Recent Orders</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Order ID</th>
                            <th class="py-2 px-4 border-b text-left">Customer</th>
                            <th class="py-2 px-4 border-b text-left">Amount</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">#1001</td>
                            <td class="py-2 px-4 border-b">John Doe</td>
                            <td class="py-2 px-4 border-b">$120.00</td>
                            <td class="py-2 px-4 border-b text-green-500">Completed</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">#1002</td>
                            <td class="py-2 px-4 border-b">Jane Smith</td>
                            <td class="py-2 px-4 border-b">$75.50</td>
                            <td class="py-2 px-4 border-b text-yellow-500">Pending</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">#1003</td>
                            <td class="py-2 px-4 border-b">Alice Brown</td>
                            <td class="py-2 px-4 border-b">$320.00</td>
                            <td class="py-2 px-4 border-b text-red-500">Cancelled</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</body>
</html>
