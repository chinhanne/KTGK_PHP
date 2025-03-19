<?php
require_once __DIR__ . '/app/config/database.php';

function getNganh() {
    $db = new Database();
    $conn = $db->getConnection();
    $query = "SELECT id, name FROM nganhhoc"; 
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
?>
