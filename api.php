<?php

// Проверяем, что метод POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Только POST запросы');
}

// Получаем JSON из запроса
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Берем картинку из поля 'image'
$base64 = $data['image'];

// Декодируем base64 в картинку
$image = base64_decode($base64);

// Сохраняем в папку static с уникальным именем
$name = uniqid() . '.png';
file_put_contents('static/' . $name, $image);

// Отвечаем
echo 'Картинка сохранена: /static/' . $name;
?>