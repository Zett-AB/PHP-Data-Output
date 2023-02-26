<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Урок 7.2. Вывод данных из MySQL. Оператор SELECT</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
</head>

<body>
    <main>
        <header>
            <h1>
                Урок 7.2. Вывод данных из MySQL. Оператор SELECT
            </h1>
            <h4 class="subtitle">
                В этом уроке с помощью PHP мы выведем данные из MySQL с помощью SQL запроса SELECT в браузер

            </h4>
        </header>
        <?php
        $nickname = "Александр!";
        $hello = "Привет, ";
        $offer = "Продолжаем изучать PHP<br>
                        На уроке рассмотрим вывод данных из MySQL с помощью SQL запроса SELECT в браузер";
        echo "<h2 class='nkname'>" . $hello . $nickname . "<br>" . "<br>" . $offer . "</h2>";
        ?>
        <section class="begin">
            <h4>
                Краткое вступление
            </h4>
            <p>
                После создания нами БД MySQL через панель упралевния phpMyAdmin в нашем локальном сервере Апач(в данном случаи используем прогу XAMPP).
            </p>
        </section>

    </main>

</body>

</html>