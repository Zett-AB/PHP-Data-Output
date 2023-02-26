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
                После создания нами БД MySQL через панель упралевния phpMyAdmin в нашем локальном сервере Апач(в данном случаи используем прогу XAMPP). <br>
                Напомню, что мы создали БД MOVIE в которой создали строки для конкретной информации и заполнили первую строку нашей БД.<br>
                Теперь переходим непосредственно к теме урока, а именно выводу данных нашей БД MySQL использую оператор SELECT.
            </p>
        </section>
        <section class="operator_s">
            <h4>
                Оператор SELECT
            </h4>
            <p>
                SELECT - оператор языка SQL, относиться к группе операторов манипуляции данными(Data Manipulation Language, DML) и служит для выборки данных из БД.<br>
                Простой пример использования оператора SELECT:<br>
                SELECT * FROM Table <a name="selec" style="color: red;"><b>!</b></a><br>
                где
            <ul>
                <li>* - показать все данные;</li>
                <li>FROM - из источника;</li>
                <li>Table - название источника(название таблицы, в нашем случаи MOVIE).</li>
            </ul>
            </p>
            <p>
                Чаще на практике нужны данные не всей таблицы, а конкретных колонок, для этого просто указываем вместо * название конкретной колонки или колонок, например:<br>
                SELECT name FROM Table<br>
                где<br>
                name - есть название колонки.
            </p>
            <p>
                Однако если нам нужно получить информацию из некольких колонок, то просто их перечисляем через запятую после оператора SELECT, например:<br>
                SELECT name, descriptions, year FROM Table<br>
                где<br>
                name, descriptions, year - это колонки из нашей таблицы MOVIE.
            </p>
        </section>
        <section class="main_part">
            <h3>Основная часть</h3>
            <h4>
                Шаг первый
            </h4>
            <p>
                Заходим в наш редактор кода в файл index.php и пишем следующий код для подключения к нашей БД MOVIE.<br>
                Как всегда сначала создаем переменную $mysqi=new mysqli('localhost', 'root', '', 'study7.2lesson');<br>
                где<br>
            <ul>
                <li>'localhost' - название нашего хоста, т.е. тут указываем имя нашего хоста;</li>
                <li>'root' - логин администратора в MyAdminPHP;</li>
                <li>'' - пароль от логина администратора в MyAdminPHP(в нашем случаи нет пароля, поэтому кавычки пустые);</li>
                <li>'study7.2lesson'- имя/название нашей БД, которую подклдючаем к нашему проекту.</li>
            </ul>
            Таким образом, мы создаем переменную $mysqli, которая имеет следующий вид:<br>
            $mysqli = new mysqwli('localhost','root','','study7.2lesson');
            </p>
            <p>
                Далее нам необходимо создать блок проверки, который сообщит нам если в нашей БД есть ошибка или с ней невозможно связаться.<br>
                Для этого пишем следуцющий код:<br>
                if(mysqli_connect_errno()){<br>
                printf("Соединение не установлено", mysqli_connect_error());<br>
                exit();<br>
                }
                <br>
                Теперь пишем код с указанием кодировки нашей таблицы, у нашей таблицы кодировка utf8.<br>
                Пишем следующий код указывая кодировку<br>
                $mysqli -> set_charset('utf8');
            </p>
            <p>
                Все теперь мы можем перейти непосредственно к написанию кода о создании запрроса к нашей БД на языке SQL.<br>
                Пишем следующий код на PHP с запросом на языке SQL:<br>
                $query=$mysqli->query('SELECT * FROM movie');<br>
                где все составляющие нам известны мы их ранее уже <a href="#selec">отмечали</a><br>
                Таким образом, мы обращаеся к БД к конкретной таблице, как бы говоря , что нам нужен весь маасив из данной таблицы.
            </p>
            <p>
                Однако, наша запись кода <br>
                $mysqli->query, возвращает массив БД, поэтому нам необходимо написать цикл while, чтобы выводить наши данные/записи из массива.<br>
                Поэтому пишем следующий цикл while:<br>
                while($row=mysqli_fetch_assoc($query)){<br>
                echo $row[name]. $row[year]."br>";<br>
                }
            </p>
            <p>
                После этого, мы пишем код о закрытии соединения с нашей БД, а именно:<br>
                $mysqli->close();
            </p>
            <p>
                Теперь ниже пишем весь код в PHP и смотрим в браузер, что у нас получилось.
            </p>
        </section>
        <section class="code_php">
            <?php
            $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');

            if (mysqli_connect_errno()) {
                printf("Соединение не установлено", mysqli_connect_error());
                exit();
            }
            $mysqi->set_charset('utf8');
            $query = $mysqi->query('SELECT * FROM movie');
            while ($row = mysqli_fetch_assoc($query)) {
                echo $row['name'] . "<br>";
            }
            $mysqi->close();

            ?>
        </section>
        <section class="other">
            <p>
                Как видим выше нам наш код вывел из нашей таблицы только наименование фильмов.<br>
                Однако, мы можем вывести из таблицы информацию из любого столбца.<br>
                Например нам нужна информация не только о наименование фильма, но и дата.<br>
                Тогда нам надо добавить в наш вышеуказанный код столбец year, а именно:<br>
                echo $row['name'].$row['year']."br>";<br>
                Теперь наш код будет выглядеть следующим образом:<br>
                ?php<br>
                $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');<br>
                if (mysqli_connect_errno()) {<br>
                printf("Соединение не установлено", mysqli_connect_error());<br>
                exit();<br>
                }<br>
                $mysqi->set_charset('utf8');<br>
                $query = $mysqi->query('SELECT * FROM movie');<br>
                while ($row = mysqli_fetch_assoc($query)) {<br>
                echo $row['name'] .$row['year']. "br>";<br>
                }<br>
                $mysqi->close();<br>
                ?>
            </p>
            <p>
                Пишем этот код и смотрим ниже на результат<br>
            <div class="db_year_name">
                <?php
                $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');

                if (mysqli_connect_errno()) {
                    printf("Соединение не установлено", mysqli_connect_error());
                    exit();
                }
                $mysqi->set_charset('utf8');
                $query = $mysqi->query('SELECT * FROM movie');
                while ($row = mysqli_fetch_assoc($query)) {
                    echo $row['name'] . $row['year'] . "<br>";
                }
                $mysqi->close();

                ?>
            </div>
            </p>
            <p>
                Такжде мы можем в нашем коде в операторе SELECT указать конкретные столбцы, которые хотим увидеть и их же укзать в echo<br>
                Например<br>
                ?php<br>
                $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');<br>
                if (mysqli_connect_errno()) {<br>
                printf("Соединение не установлено", mysqli_connect_error());<br>
                exit();<br>
                }<br>
                $mysqi->set_charset('utf8');<br>
                $query = $mysqi->query('SELECT name, year, descriptions FROM movie');<br>
                while ($row = mysqli_fetch_assoc($query)) {<br>
                echo $row['name'] .$row['year'].$row['descriptions']. "br>";<br>
                }<br>
                $mysqi->close();<br>
                ?>
            </p>
            <p>
                Смотрим, что получилось ниже
            </p>
            <div class="db_name_year_desc">
                <?php
                $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');
                if (mysqli_connect_errno()) {
                    printf("Соединение не установлено", mysqli_connect_error());
                    exit();
                }
                $mysqi->set_charset('utf8');
                $query = $mysqi->query('SELECT name, year, descriptions FROM movie');
                while ($row = mysqli_fetch_assoc($query)) {
                    echo $row['name'] . $row['year'] . $row['descriptions'] . "<br>";
                }
                $mysqi->close();
                ?>

            </div>
        </section>
        <p>
            На этом все.
        </p>
    </main>

</body>

</html>