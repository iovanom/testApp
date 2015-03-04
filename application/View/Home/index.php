<h2>Home Page</h2>
<?php
    if($this->viewBag['msg']){
        echo "<h3>" . $this->viewBag['msg'] . "</h3>";
    }
    
?>

<div class="login-form">
    <?php if(isset($_SESSION['user_login'])): ?>
        <a href="/user" class="btn btn-primary">Панель пользователя</a>
    <?php else: ?>
        <a href="/user/login" class="btn btn-primary">Войти</a>
        <a href="/user/registre" class="btn btn-primary">Зарегистрироваться</a>
    <?php endif; ?>
</div>
