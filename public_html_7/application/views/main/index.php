<p>Главная страница</p>
<p>Шаблон находится: application/views/layouts/main/index.php</p>
<br>
<?php foreach($news_MainController as $val): ?>
<h3><?=$val['title']?></h3>
<p><?=$val['description']?></p>
<hr>
<?php endforeach;?>
<br>
<?php //debug($news_MainController);?>