<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Кредитный калькулятор</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <header>
            <h1>
                Кредитный калькулятор
            </h1>
    </header>
    <body>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                <fieldset>
                    <legend>Расчет кредита</legend>
                    <label for="sum">Введите сумму кредита</label>
                    <input type="number" name="sum" id="sum" required><br>
                        
                    <label for="time">Введите срок кредита в месяцах</label>
                    <input type="number" name="time" id="time" required><br>
                        
                    <label for="proc">Введите процентную ставку</label>
                    <input type="number" name="proc" id="proc" step="any" required><br>
                               
                    <label for="first">Введите размер первоначального взноса</label>
                    <input type="number" name="first" id="first"><br>
                        
                    <button type="submit">Рассчитать</button>
                </fieldset>
            </form>

            <div class="text">Всем привет, меня зовут Руслан, я учусь на веб-разработчика. 
                Это мой первый малый проект. Данным проектом я хотел показать свои начальные
                навыки в HTML, CSS и PHP, также думаю, что данный проект я буду дополнять по мере
                своей креатинвости. Пока в планах есть создать здесь страничку авторизации,
                надеюсь, что все получится. И да, кстати, чуть не забыл, я нахожусь в поиске работы
                и готов буду рассмотреть различные предложения, помимо всего прочего у меня есть опыт
                работы с Битрикс24 в качестве администратора, был опыт написания скрипта для Битрикс24
                 с выгрузкой данных через Webhook из Б24 в сторонний сервис. Спасибо, что уделили время и просмотрели
                мой проект, буду рад увидеть отклики и предложения.</div>


                <div class="class">
                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sum = $_POST['sum'];
                    $time = $_POST['time'];
                    $proc = $_POST['proc'];
                    $first = $_POST['first'];

                    if ($first == null) {
                        $first = '0';
                    }

                    function credit ($sum, $time, $proc, $first){

                    $sum = $sum - $first;
                    $mounthStav = ($proc / 12) / 100;

                    $kef = ($mounthStav * (1 + $mounthStav) ** $time) / ((1 + $mounthStav) ** $time - 1);

                    $payment = $sum * $kef;

                    $overpayment = $payment * $time - $sum;

                    echo 'Ваш ежемесячный платеж составляет '. round($payment, 1) .' рублей'. '<br>Переплата по кредиту составляет '. round($overpayment, 1) .' рублей';
                    }

                    credit ($sum, $time, $proc, $first);
                    }
                    ?>
                </div>
    </body>
</html>