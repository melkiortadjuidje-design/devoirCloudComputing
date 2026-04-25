<?<php>
// On vérifie que le formulaire a été enoyé
if ($_SERVER["REQUEST_METHOD"] == "POST"){
// On récupère les données avec $_POST['name']
$Noms = $_POST['nom']
$Prenom = $_POST['prenom']
$Password = $_POST['mdp']
$Email = $_POST['mail']
$Age = $_POST['age']
$Naissance = $_POST['naissance']
$Photo = $_POST['avatar']
$Sexe = $_POST['sexe']
$Condition = $_POST['accepte']
// Sécurité de base : éviter les failles XSS
$Noms = htmlspecialchars($Noms);
$Email = htmlspecialchars($Email)
// Ici je fais ce que je veux avec les données
echo "Salut $Noms, on a bien recu ton formulaire";
// Exemple : Enreigistrer en BDD, envoyer un Mail, etc.
} else {
    echo "Acces interdit";
}
    <?>