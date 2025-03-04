<?php
require_once __DIR__ . '/../config.php'; 
require_once __DIR__ . '/../model/User.php'; 

class UserController {

    // Ajouter
    public function addUser($user) {
        $sql = "INSERT INTO user1 (nom,email, pwd) VALUES (:nom,:email, :pwd)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $user->getNom(),
                'email' => $user->getEmail(),
                'pwd' => $user->getPwd()
            ]);
        } catch (Exception $e) {
            die("Erreur: " . $e->getMessage());
        }
    }

    // supprimer
    public function deleteUser($id) {
        $sql = "DELETE FROM user1 WHERE id = :id";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id
            ]);
        } catch (Exception $e) {
            die("Erreur: " . $e->getMessage());
        }
    }

    // modifier
    public function updateUser($id,$nom, $email, $pwd) {
        $sql = "UPDATE user1 SET nom =:nom ,email = :email, pwd = :pwd WHERE id = :id";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'nom'=> $nom,
                'email' => $email,
                'pwd' => $pwd
            ]);
        } catch (Exception $e) {
            die("Erreur: " . $e->getMessage());
        }
    }

    // Afficher 
    public function getUsers() {
        $sql = "SELECT id,nom,email, pwd FROM user1";  
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);  
        } catch (Exception $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
}
?>
