<?php
header("Content-type:text/html; charset=UTF-8");
require_once "CRUD_not_update.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Гостевая книга</title>
  <link href="css/normalize.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <section class="Title">
      <form class="read_book" method="post" action="CRUD_not_update.php">
          <p>Запишите заметку</p>
        <p>
          Тема:
          <input name="title" tpe="text" required>
        </p>
        <p>
          Запись:<br>
          <textarea name="message" cols="30" rows="10" required></textarea>
        </p>
        <button class="btn_login btn_write" type="submit">Записать</button>
      </form>
        <form method="post" action="delete.php">
            <label for="data">Номер записи</label>
            <select id="data" name="dataS">
                <?php
                $index_db = connect();
                $query = mysqli_query($index_db, "SELECT id FROM message");
                $index = mysqli_fetch_all($query);
                foreach ($index as $i => $key):?>
                    <option selected value="<?=$key[0]?>"><?=$i?></option>
                <?php endforeach;?>
            </select>
            <button class="btn_login btn_write" type="submit">Удалить</button>
        </form>
    </section>
    <hr>
    <section class="message">
      <?php $message = read(); arsort($message);?>
            <?php foreach ($message as $key => $value):?>
                <div class="message-container">
                    <h2>Номер записи: <?=$key?></h2>
                    <p class="Title-container">Тема: <?=$value[1]?>;<br> <?='Дата создания: ' . $value[3]?></p>
                    <p><?=nl2br(htmlspecialchars($value[2]))?></p>
                </div>
            <?php endforeach;?>
    </section>
</body>
</html>