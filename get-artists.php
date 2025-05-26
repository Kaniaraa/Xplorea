<?php
$pdo = new PDO("mysql:host=localhost;dbname=xplorea", "root", "");

$artists = $pdo->query("SELECT * FROM artists")->fetchAll(PDO::FETCH_ASSOC);

$result = [];
foreach ($artists as $artist) {
    $artworks = $pdo->prepare("SELECT title, image FROM artworks WHERE Id_user = ?");
    $artworks->execute([$artist['id']]);
    $art = $artworks->fetchAll(PDO::FETCH_ASSOC);

    $result[] = [
        'name' => $artist['name'],
        'artworks' => array_map(fn($a) => [
            'title' => $a['title'],
            'image' => $a['image']
        ], $art)
    ];
}

header('Content-Type: application/json');
echo json_encode($result);
