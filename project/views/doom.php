{% extends "___layout.twig" %}

{% block content %}
<div class="m-2">
Тут мы вам расскажем о Doom 2016<br>
</div>
<?php
$is_image = preg_match("#/image$#", $url);
$is_info = preg_match("#/info$#", $url);
?>

<a type="button" class="btn m-2  <?= $is_image ? "btn-primary" : 'btn-link' ?>" href="/doom-2016/image">Картинка</a>
<a type="button" class="btn m-2 <?= $is_info ? "btn-primary" : 'btn-link'  ?>"  href="/doom-2016/info">Описание</a>
<br>

<ul class="list-group">
    
<?php if ($is_image){ ?>
    <li class="list-group-item"><img  height="500em" src="\images\doom-2016.jpg" alt=""></li>
<?php } else if ($is_info) { ?>
    <li class="list-group-item">
    Doom (стилизованное написание — DOOM) — мультиплатформенная компьютерная игра в жанре шутера от первого лица. Разработана компанией id Software совместно со студией Certain Affinity и издана Bethesda Softworks. Игра вышла на Windows, Xbox One и PlayStation 4 13 мая 2016 года. 10 ноября 2017 года состоялся релиз на Nintendo Switch.
    </li>
    <?php } 
{% endblock %}