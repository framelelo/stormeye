<?php

global $pdo;

function createPost( $id_user, $image, $content) {
    try {
        global $pdo;
        $query = "INSERT INTO posts (id_user, image, content, date) VALUES (:u, :i, :c, :d)";
        $statement = $pdo->prepare($query);
        $statement->execute([
            'u' => $id_user,
            'i' => $image,
            'c' => $content,
            'd' => date('Y-m-d H:i:s'),
        ]);
        return true;
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
        return false;
    }
}

function getPost($id) {
    try {
    global $pdo;
    $query = "SELECT * FROM posts WHERE id = :i";
    $statement = $pdo->prepare($query);
    $statement->execute(['i' => $id]);
    $post = $statement->fetch();
    return $post;
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
        return false;
    }
}
function getAllPosts() {
    try {
    global $pdo;
    $query = "SELECT * FROM posts" . " ORDER BY `date` DESC";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll();
    return $posts;
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
        return false;
    }
}


function deletePost($id) {
    try {
    global $pdo;
    $query = "DELETE FROM posts WHERE id = :i";
    $statement = $pdo->prepare($query);
    $statement->execute(['i' => $id]);
    return true;
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
        return false;
    }
}
function updatePost($id, $picture, $content) {
    try {
        global $pdo;
        $query = "UPDATE posts SET image = :i, content = :c, date = :d WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->execute([
            'i' => $picture,
            'c' => $content,
            'd' => date('Y-m-d H:i:s'),
            'id' => $id
        ]);
        return true;
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
        return false;
    }
}

