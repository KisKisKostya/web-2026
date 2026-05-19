<?php

function getZodiacSign(string $dateString): string
{
    preg_match_all('/\d+/', $dateString, $matches);
    $numbers = $matches[0];

    if (count($numbers) < 3) {
        return 'Не вводите дату в письменном виде';
    }

    $day   = (int)$numbers[0];
    $month = (int)$numbers[1];
 
    if ($month < 1 || $month > 12 || $day < 1 || $day > 31) {
        return 'Ошибка: некорректная дата';
    }

    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        return 'Овен';
    }
    if (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        return 'Телец';
    }
    if (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
        return 'Близнецы';
    }
    if (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
        return 'Рак';
    }
    if (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        return 'Лев';
    }
    if (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        return 'Дева';
    }
    if (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
        return 'Весы';
    }
    if (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
        return 'Скорпион';
    }
    if (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        return 'Стрелец';
    }
    if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        return 'Козерог';
    }
    if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        return 'Водолей';
    }
    if (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
        return 'Рыбы';
    }

    return 'Неизвестный знак';
}

$dateInput = $_GET['date'] ?? null;

if ($dateInput === null || $dateInput === '') {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Знак зодиака по дате</title>
        <link rel="stylesheet" href="../src/styles.css">
    </head>
    <body>
        <form method="get">
            <p>МЕГАСУПЕРУЛЬТРАПРОГРАММА для определения знака зодиака</p>
            <label for="date">Введите дату (например, 01.02.1993):</label>
            <input type="text" id="date" name="date" required>
            <button type="submit">Определить</button>
        </form>
    </body>
    </html>
    <?php
    exit;
}

echo getZodiacSign($dateInput);