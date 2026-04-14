<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Login
        </h2>

        <form method="POST" action="/login" class="space-y-5">
            <!-- CSRF Laravel -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Email / Username -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input 
                    type="text" 
                    name="username"
                    required
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan username"
                >
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password"
                    required
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan password"
                >
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Login
            </button>
        </form>

    </div>

</body>
</html>