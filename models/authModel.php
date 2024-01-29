<?php

global $pdo;

function registerUsers($picture, $username, $email, $password)
{

    global $pdo;
    try {
        $checkQuery = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :e");
        $checkQuery->execute(["e" => $email]);
        $emailExists = $checkQuery->fetchColumn();
        if ($emailExists) {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    try {
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
        echo 'Error:' . $e->getMessage();
        return false;
    }
}

function loginUsers($email, $password)
{
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
function getUsername($id)
{
    global $pdo;
    try {

        $query = $pdo->prepare("SELECT username FROM users WHERE id = :id");
        $query->execute([
            "id" => $id
        ]);
        $user = $query->fetch();
        return $user["username"];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
function getUserImage($id)
{
    global $pdo;
    $query = $pdo->prepare("SELECT picture FROM users WHERE id = :id");
    $query->execute([
        "id" => $id
    ]);
    $user = $query->fetch();
    return $user["picture"];
}
