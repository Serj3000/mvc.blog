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
    //$url=trim($_SERVER['REQUEST_URI'],'/');
    $url=$_SERVER['REQUEST_URI'];

    echo '<pre>________________________________________________________________';
    echo "<br><br>Привет. I am debuger. I live in '/application/lib/Dev.php'<br><br><br>";
    echo '<br>Путь: '.$url.'<br><br><br>';
    var_dump($str);
    echo '<br></pre>_________________________________________________________';
    echo '<pre>';
    //echo '<br>Путь: '.$this->route['controller'].'<br><br><br>';
    echo '</pre>';
    exit;
}