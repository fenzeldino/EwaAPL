<?php 
header("Access-Control-Allow-Origin: http://localhost:5173");//  // Erlaubt Zugriff von überall (für Entwicklung ok)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

$link = new mysqli("localhost","g13","dm38tan","test");

if($link->connect_error){
    die(json_encode(["error" => "DB-Verbindung fehlgeschlagen"]));
}

$link->set_charset("utf8mb4");

$query = "SELECT * FROM buecher";
$result = $link->query($query);

$data = [];

if($result){
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
$link->close();
?>