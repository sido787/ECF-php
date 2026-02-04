<?php

require_once __DIR__ . '/Database.php';

class Contact
{
    public static function create($name, $email, $message)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO contacts (name, email, message)
                VALUES (:name, :email, :message)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'message' => $message
        ]);
    }
}