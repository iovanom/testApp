
<h2><a href="/user">User Page</a></h2>

<div class="container">
    <div class="content">
        <h4 align="center">Загруженные файлы </h4>
    </div>
    <div class="sidebar">
        <h4 align="center">Информация</h4>
        <form action="/user/update" method="post">
            <input type="hidden" name="userId" value="<?= $this->model->id ?>" />
            <table class="table">
                <tr >
                    <td>Логин</td><td><?= $this->model->login ?></td><td><a href="#" data-type="text" onclick="showForm(this.id, this.dataset.type)" id="login">Изменить</a></td>
                </tr>
                <tr >
                    <td>Пароль</td><td>*************</td><td><a href="#" data-type="password" onclick="showForm(this.id, this.dataset.type)" id="password">Изменить</a></td>
                </tr>
                <tr >
                    <td>Имя</td><td><?= $this->model->firstName ?></td><td><a href="#" data-type="text" onclick="showForm(this.id, this.dataset.type)" id="firsName">Изменить</a></td>
                </tr>
                <tr >
                    <td>Фамилия</td><td><?= $this->model->secondName ?></td><td><a href="#" data-type="text" onclick="showForm(this.id, this.dataset.type)" id="secondName">Изменить</a></td>
                </tr>
                <tr >
                    <td>Телефон</td><td><?= $this->model->phone ?></td><td><a href="#" data-type="text" onclick="showForm(this.id, this.dataset.type)" id="phone">Изменить</a></td>
                </tr>
                <tr >
                    <td>e-mail</td><td><?= $this->model->email ?></td><td><a href="#" data-type="email" onclick="showForm(this.id, this.dataset.type)" id="email">Изменить</a></td>
                </tr>
                <tr >
                    <td>Дата рождения</td><td><?= $this->model->birdthday ?></td><td><a href="#" data-type="date" onclick="showForm(this.id, this.dataset.type)" id="birdthday">Изменить</a></td>
                </tr>
            </table>
        </form>
        
    </div>
</div>

<div>
    <a class="btn btn-primary" href="/user/logout">Выйти</a>
</div>
<script>
    function showForm(id, type)
    {
        
        if(type === 'date')
        {
            var content1 = "<input type="+ type +" name=" + id +" placeholder='dd/mm/yyyy'/>";
        }else{
             var content1 = "<input type="+ type +" name=" + id +" />";
        }
        var content2 = "<input type=button class='btn btn-default' value='Сохранить' onclick=update(this) />";
        document.getElementById(id).parentElement.previousSibling.innerHTML = content1;
        document.getElementById(id).parentElement.innerHTML = content2;
    }
    
    function update(obj)
    {
        var name = obj.parentElement.previousSibling.children[0].name;
        var value = obj.parentElement.previousSibling.children[0].value;
        var iduser = <?= $this->model->id ?>;
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                obj.parentElement.previousSibling.innerHTML=xmlhttp.responseText;
                obj.parentElement.innerHTML = '<a href="#" data-type="' + obj.parentElement.previousSibling.type + '" onclick="showForm(this.id, this.dataset.type)" id="'+ name +'">Изменить</a>';
            }
        }
        xmlhttp.open("POST","/user/update",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("iduser="+ iduser +"&name=" + name + "&value=" + value);
    }
</script>