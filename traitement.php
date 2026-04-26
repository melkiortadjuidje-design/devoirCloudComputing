<?php
$host = "localhost";
$user = "melkior";
$password = "Melkior@1234";
$dbname = "fastfood";

// Connexion MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Vérification
if ($conn->connect_error) {
    die("Erreur : " . $conn->connect_error);
}

echo "Connexion MySQL réussie<br>";

// Vérifier si le formulaire est envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// On récupère les données avec $_POST['name']
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $email = $_POST['mail'];
    $age = $_POST['age'];
    $naissance = $_POST['naissance'];
    $sexe = $_POST['sexe'];
    $token = $_POST['token'];
    $photo = $_FILES['avatar']['name'];

    // Sécurité de base : éviter les failles XSS
$nom = htmlspecialchars($nom);
$email = htmlspecialchars($email);

    // Checkbox
    $accepte = isset($_POST['accepte']) ? "Oui" : "Non";
    // recuperation des données par la base
    $sql = "INSERT INTO client (Nom, Prenom, Email, MDP, Age, Date_de_naissance, Sexe, Photo)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssisss",
    $nom,
    $prenom,
    $email,
    $mdp,
    $age,
    $naissance,
    $sexe,
    $photo
);

$stmt->execute();
    // Ici je fais ce que je veux avec les données
echo "Salut $nom, on a bien recu ton formulaire <br>";

    echo "Nom : $nom <br>";
    echo "Prénom : $prenom <br>";
    echo "Mot de passe : $mdp <br>";
    echo "Email : $email <br>";
    echo "Age : $age <br>";
    echo "Naissance : $naissance <br>";
    echo "Sexe : $sexe <br>";
    echo "Conditions acceptées : $accepte <br>";

    // Exemple : Enreigistrer en BDD, envoyer un Mail, etc.
} else {
    echo "Acces interdit";
}

if (isset($_FILES['avatar'])) {
$photo = $_FILES['avatar']['name'];
$tmp = $_FILES['avatar']['tmp_name'];

move_uploaded_file($tmp, "uploads/" . $photo);  

echo "Photo envoyée : " . $photo;

}

?>
