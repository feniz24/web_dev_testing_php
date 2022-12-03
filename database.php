<?php 

$db = new PDO('mysql:dbhost=localhost;dbname=project', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

$statement = $db->query("SELECT * FROM roles");

// $result = $statement->fetchAll();
// print_r($result);

$row1 = $statement->fetch();
print_r($row1);

// $sql = "INSERT INTO roles (name,value) VALUES ('Supervisor', 4)";
// $db->query($sql);


$sql = "INSERT INTO roles (name,values) VALUES (:name, :value)";

$statement = $db ->prepare($sql);

$statement->execute([
    ':name' => 'God',
    ':value' => 999
]);

echo $db->lastInsertId(); //return auto-increment ID's record

$sql = "UPDATE roles SET name=:name WHERE value = 999";

$statement = $db->prepare($sql);

$statement->execute([
    ':name' => 'Superman'
]);

echo $statement->rowCount();