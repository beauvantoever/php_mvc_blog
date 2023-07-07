<?php
session_start();

// Controleer of de gebruiker is ingelogd, anders doorsturen naar de inlogpagina
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: ?controller=user&action=login');
    exit;
}

// Gebruikersnaam ophalen uit de sessie
$username = $_SESSION['name'];

// Inclusief de layout
require_once('views/layout.php');

// Controleer of het formulier is ingediend voor het bijwerken van het account
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Controleer of de vereiste velden zijn ingevuld
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Verkrijg de ingediende waarden
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Voer hier de validatie en update van de gebruikersgegevens uit

        // Voorbeeldvalidatie: Controleer of de velden niet leeg zijn
        if (!empty($name) && !empty($email) && !empty($password)) {
            // Voorbeeldupdate: Gebruik de User-modelklasse om de gebruiker bij te werken
            $user = new User($name, $email, $password);
            $user->updateUser();
            echo "Account is succesvol bijgewerkt!";
        } else {
            echo "Vul alle vereiste velden in!";
        }

    } else {
        echo "Er is een probleem opgetreden bij het verwerken van het formulier!";
    }
}
?>

<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md">
        <div class="py-4 px-6">
            <h1 class="text-2xl font-bold mb-2">Profielpagina</h1>
            <p class="text-gray-600">Welkom,
                <?php echo $username; ?>!
            </p>
        </div>
        <div class="bg-gray-100 py-4 px-6">
            <form method="POST" action="?controller=user&action=updateUser">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Gebruikersnaam
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" name="name" type="text" placeholder="Gebruikersnaam" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        E-mailadres
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="email" placeholder="E-mailadres" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Wachtwoord
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password" type="password" placeholder="Wachtwoord" required>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Opslaan
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-gray-100 py-4 px-6">
            <a href="?controller=user&action=signOut" class="text-red-500 hover:text-red-700">Uitloggen</a>
        </div>
    </div>
</div>