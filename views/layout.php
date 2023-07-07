<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Link naar Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="layout.css">
</head>
<body class="bg-gray-100">
    <header class="header py-4 px-8">
        <nav class="flex justify-between items-center">
            <a href="index.php" class="text-lg font-semibold text-blue-500 hover:underline">Home</a>
            <?php if ($_SESSION['loggedIn']): ?>
                <a href="?controller=posts&action=index" class="ml-4 text-lg font-semibold text-blue-500 hover:underline">Posts</a>
                <a href="?controller=posts&action=create" class="ml-4 text-lg font-semibold text-blue-500 hover:underline">Create</a>
                <a href="?controller=user&action=showProfile" class="ml-4 text-lg font-semibold text-blue-500 hover:underline">Profile</a>
                <a href="?controller=user&action=signOut" class="ml-4 text-lg font-semibold text-blue-500 hover:underline">Sign Out</a>
            <?php else: ?>
                <?php if ($action !== 'showSignUp' && $action !== 'login'): ?>
                    <a href="?controller=user&action=showSignUp" class="ml-4 text-lg font-semibold text-blue-500 hover:underline">SignUp</a>
                    <a href="?controller=user&action=login" class="ml-4 text-lg font-semibold text-blue-500 hover:underline">Login</a>
                <?php else: ?>
                    <!-- Gebruik van de extra klasse voor de navigatielinks op de signup- en login-pagina's -->
                    <a href="?controller=user&action=showSignUp" class="ml-4 text-lg font-semibold text-blue-500 hover:underline nav-link-auth">SignUp</a>
                    <a href="?controller=user&action=login" class="ml-4 text-lg font-semibold text-blue-500 hover:underline nav-link-auth">Login</a>
                <?php endif; ?>
            <?php endif; ?>
        </nav>
    </header>

    <main class="flex-grow">
        <?php require_once('routes.php'); ?>
    </main>

    <footer class="bg-gray-200 py-4 px-8 text-center text-gray-500 text-sm sticky bottom-0">
        &copy; <?php echo date("Y"); ?> Beau van 't Oever
    </footer>

</body>
</html>
