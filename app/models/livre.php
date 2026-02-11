<?php

require_once __DIR__ . '/Database.php';

class Livre
{

    // GET ALL LIVRES
   
    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = "SELECT * FROM livres ORDER BY id DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    // GET ONE LIVRE
    
    public static function getOne($id)
    {
        $pdo = Database::connect();

        $sql = "SELECT * FROM livres WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   
    // CREATE LIVRE
   
    public static function create($titre, $annee, $disponible)
    {
        $pdo = Database::connect();

        $sql = "INSERT INTO livres (titre, annee_publication, disponible)
                VALUES (:titre, :annee_publication, :disponible)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':titre' => $titre,
            ':annee_publication' => $annee,
            ':disponible' => $disponible
        ]);
    }

    
    // UPDATE LIVRE
    
    public static function update($id, $titre, $annee, $disponible)
    {
        $pdo = Database::connect();

        $sql = "UPDATE livres
                SET titre = :titre,
                    annee_publication = :annee_publication,
                    disponible = :disponible
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id,
            ':titre' => $titre,
            ':annee_publication' => $annee,
            ':disponible' => $disponible
        ]);
    }

    
    // DELETE LIVRE
    
    public static function delete($id)
    {
        $pdo = Database::connect();

        $sql = "DELETE FROM livres WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }

}