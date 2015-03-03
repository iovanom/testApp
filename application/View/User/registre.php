<h2>Регистрация</h2>
<div class="content-form">
    <form action="/user/registre" method="post">
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Ваш логин" required="required">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ваш пароль" required="required">
        </div>
        <div class="form-group">
            <label for="password2">Повторите пароль</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Пароль еще раз" required="required">
        </div>
        <div class="form-group">
            <label for="firstName">Имя</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Ваше имя" required="required">
        </div>
        <div class="form-group">
            <label for="secondName">Фамилия</label>
            <input type="text" class="form-control" id="secondName" name="secondName" placeholder="Ваше Фамилия" required="required">
        </div>
        <div class="form-group">
            <label for="email">е-маил</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ваш е-маил" >
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Ваш Телефон" >
        </div>
        <div class="form-group">
            <label for="birdthday">День рождение</label>
            <input type="date" class="form-control" id="birdthday" name="birdthday" placeholder="День рождение" >
        </div>
        
        <input type="hidden" name="userReg" value="true" />
        <button type="submit" class="btn btn-default">Регистрация</button>
    </form>
</div>
