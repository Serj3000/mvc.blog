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
function debug($str,$param=__FILE__)
{
    //$url=trim($_SERVER['REQUEST_URI'],'/');
    $url=$_SERVER['REQUEST_URI'];

    echo '<pre>________________________________________________________________';
    echo "<br><br>Привет. I am debuger. I live in <br>".__FILE__."<br><br><br>";
    echo '<br>Файл: '.$param.'<br><br><br>';
    echo '<br></pre>';
    echo '<pre>';
    print_r($str);
    echo '<br></pre>_________________________________________________________';
    exit;
}