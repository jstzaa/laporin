<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4 sm:px-6">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-6 sm:p-8">
        <h2 class="text-xl sm:text-2xl font-bold text-center text-gray-800 mb-6">
            Login
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Username -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Username
                </label>
                <input 
                    type="text" 
                    name="username"
                    value="{{ old('username') }}"
                    required
                    class="mt-1 w-full px-4 py-2 text-sm shadow-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan username"
                >
                @error('login')
                    <span class="text-xs sm:text-sm text-red-500 mt-1 block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input 
                    type="password" 
                    name="password"
                    required
                    class="mt-1 w-full px-4 py-2 text-sm shadow-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan password"
                >
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full shadow-lg bg-blue-600 text-white py-2 text-sm rounded-lg hover:bg-blue-700 transition"
            >
                Login
            </button>
        </form>
    </div>
</body>
</html>