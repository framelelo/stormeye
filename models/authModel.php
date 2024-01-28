<?php

    global $pdo;
    
    function registerUsers($picture, $username, $email, $password) {
    try {
        global $pdo;
        $query = "INSERT INTO users (picture, username, email, password) VALUES (:i, :u, :e, :p)";
        $statement = $pdo->prepare($query);
        $statement->execute([
            'i' => $picture,
            'u' => $username,
            'e' => $email,
            'p' => password_hash($password, PASSWORD_DEFAULT),
        ]);
        return true;
    } catch (PDOException $e) {
        echo 'Error:'. $e->getMessage();
        return false;
    }
}

function loginUsers($email, $password) {
    global $pdo;

    try {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :e");

        $query->execute([
            "e" => $email
        ]);
        $user = $query->fetch();
        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user["password"])) {
            return false;
        }

        $_SESSION["user"] = $user;

        return true;
    } catch (PDOEXCEPTION $e) {
        echo $e->getMessage();
        return false;
    }
}
