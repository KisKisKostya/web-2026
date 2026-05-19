<?php

function factorial(int $n): int
{
    if ($n < 0) {
        return 0;
    }
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

$numberInput = $_GET['n'] ?? null;

if ($numberInput === null || $numberInput === '') {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Факториал (рекурсия)</title>
        <link rel="stylesheet" href="../src/styles.css">
    </head>
    <body>
        <form method="get">
            <p>МЕГАСУПЕРУЛЬТРАПРОГРАММА для определения факториала</p>
            <label for="n">Введите неотрицательное целое число:</label>
            <input type="number" id="n" name="n" required>
            <button type="submit">Вычислить</button>
        </form>
    </body>
    </html>
    <?php
    exit;
}

$number = (int)$numberInput;

if ($number < 0) {
    echo 'Ошибка: число должно быть неотрицательным.';
    exit;
}

echo factorial($number);