<?php
// Activer l'affichage des erreurs (pour le développement)
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors', 1);

// Informations de connexion à la base de données
$host = '127.0.0.1';  // Adresse du serveur MySQL
$port = '3306';       // Port par défaut de MySQL
$dbname = 'Test';   // Nom de la base de données
$user = 'asso';        // Nom d'utilisateur MySQL
$password = 'asso';        // Mot de passe (mettre à jour si nécessaire)

try {
    // Connexion à la base de données MySQL avec PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password);
    
    // Configuration de PDO pour afficher les erreurs SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];

        // Préparer la requête SQL pour insérer les données
        $sql = "INSERT INTO utilisateurs (nom, prenom, email) VALUES (:nom, :prenom, :email)";
        $stmt = $pdo->prepare($sql);
        
        // Exécuter la requête avec les valeurs du formulaire
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
        ]);

        echo "Inscription réussie !";
    }
} catch (PDOException $e) {
    // En cas d'erreur, afficher le message
    echo "Erreur : " . $e->getMessage();
}
?>
