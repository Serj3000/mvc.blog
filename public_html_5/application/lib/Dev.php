<!-- <html>
    <form method="POST" action="http://mvc.blog">
        <button type="submit" class="btn btn-primary">Перейти на mvc.blog </button>
    </form>
</html> -->

<?php

//Вывод ошибок на єкран
ini_set('display_errors',1);

//Активируем отчет об ошибках c флагом E_ALL
error_reporting(E_ALL);

//Функция для которая будет принимать значения ошибок и выводить их через var_dump
function debug($str)
{
    echo '<pre>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^';
    echo "<br><br>Привет. I am debuger. I live in '/application/lib/Dev.php'<br><br><br>";
    // var_dump($str);
    // echo '<br><br>';
    // echo '<br>----------------------------------------------------------------';
    echo '<br><br>';
    print_r($str);
    echo '<br><br>';
    //echo $str;
    echo '<br></pre>________________________________________________________________';
    echo '<br><br>';
    //exit;
}