<h2>Home Page</h2>
<?php
    if($this->viewBag['msg']){
        echo "<h3>" . $this->viewBag['msg'] . "</h3>";
    }
?>
<div class="login-form">
    <a href="/user/login" class="btn btn-primary">Войти</a>
    <a href="/user/registre" class="btn btn-primary">Зарегистрироваться</a>

</div>
