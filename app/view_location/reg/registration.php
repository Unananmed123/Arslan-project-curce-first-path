<?php
/** @var string $error_message - Текст ошибки */
?>
<div class="page">
<link rel="stylesheet" href="../app/view_location/reg/registration.php">
<div class="container">
    <div class="auth_block">
        <h1 class="title"></h1>
        <form action="" method="post">
            <label for="name">Имя</label>
            <input type="text" name="Name">

            <label for="login">Логин</label>
            <input type="text" name="login">

            <label for="password">Пароль</label>
            <input type="text" name="password">

            <label for="password_confirm">Повторите пароль</label>
            <input type="text" name="password_confirm">

            <input type="submit" value="Зарегестрироваться">
            <a href="#">Уже зарегестрированы? - Авторизуйтесь</a>
        </form>
    </div>
</div>
</div>