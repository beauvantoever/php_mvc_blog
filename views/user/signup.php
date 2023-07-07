<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="max-w-md w-full mx-auto mt-8 bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-6">Sign Up</h2>
<form class="space-y-4" method="POST" action="index.php?controller=user&action=signUp">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="registerName">
                    Name
                </label>
                <input class="w-full border border-blue-300 p-2 rounded" id="registerName" name="registerName" type="text" placeholder="Enter your name">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="registerEmail">
                    Email
                </label>
                <input class="w-full border border-blue-300 p-2 rounded" id="registerEmail" name="registerEmail" type="email" placeholder="Enter your email">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="registerPassword">
                    Password
                </label>
                <input class="w-full border border-blue-300 p-2 rounded" id="registerPassword" name="registerPassword" type="password" placeholder="********">
            </div>
            <div class="flex justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</body>
</html>
