<?php

    global $pdo;
    
    function registerUsers($picture, $username, $email, $password) {
    try {
        global $pdo;
        $query = "INSERT INTO users (picture, username, email, password) VALUES (:p, :u, :e, :p)";
        $statement = $pdo->prepare($query);
        $statement->execute([
            'p' => $picture,
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
    try {
        global $pdo;
        $query = "SELECT * FROM users WHERE email = :e";
        $statement = $pdo->prepare($query);
        $statement->execute(['e' => $email]);
        $user = $statement->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo 'Error:'. $e->getMessage();
        return false;
    }
}