<div class="m-2">
Будешь отыгрывать роль школьника? Тогда тебе сюда!<br>
</div>
<?php
$is_image = preg_match("#/image$#", $url);
$is_info = preg_match("#/info$#", $url);
?>

<a type="button" class="btn m-2 <?= $is_image ? "btn-primary" : 'btn-link' ?>" href="/persona-2/image">Картинка</a>
<a type="button" class="btn m-2 <?= $is_info ? "btn-primary" : 'btn-link'  ?>"  href="/persona-2/info">Описание</a>
<br>

<ul class="list-group">
    
<?php if ($is_image){ ?>
    <li class="list-group-item"><img  height="500em" src="\images\persona-2.jpg" alt=""></li>
<?php } else if ($is_info) { ?>
    <li class="list-group-item">
    Shin Megami Tensei: Persona 2 — Innocent Sin (в Японии Persona 2: Tsumi (яп. ペルソナ２ 罪)) — 
    ролевая компьютерная игра, разработанная и изданная японской компанией Atlus. Выпуск состоялся 24 
    июня 1999 года для игровой приставки PlayStation. В 2011 году вышло переиздание игры для портативной 
    консоли PlayStation Portable. Persona 2: Innocent Sin является второй в серии игр Persona.
    </li>
    <?php } ?>