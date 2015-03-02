<h2><?= $this->viewBag['msg'] ?></h2>

<div class="content-form">
    <form action="/user" method="post">
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Ваш логин" required="required">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ваш пароль" required="required">
        </div>
        <input type="hidden" name="userLogin" value="true" />
        <button type="submit" class="btn btn-default">Войти</button>
    </form>
</div>
