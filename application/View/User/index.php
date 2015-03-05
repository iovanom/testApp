
<h2><a href="/user">User Page</a></h2>

<div class="container">
    <div class="content">
        <div class="panel panel-default">
            <div class="panel-heading">Загруженные файлы( <?=($this->model->filesNr) ; ?> Файл(ов); Макс.<?= MAX_FILES_UPLOAD ?> )</div>
            <div class="panel-body" id="files">

            </div>
        </div>


        <?php
        if($this->model->filesNr < MAX_FILES_UPLOAD ):
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">Загрузить файл</div>
            <div class="panel-body">
                <form action="/user/upload" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="file"/>
                    <input type="hidden" name="userId" value="<?= $this->model->id ?>" />
                    <button type="submit" class="btn btn-default" >
                        <span class="glyphicon glyphicon-open" >Загрузить</span>
                    </button>
                </form>
            </div>
        </div>
        <?php
        endif;
        ?>
    </div>

<div class="sidebar">
    <div class="content-sidebar">
        <div class="panel panel-default">
            <div class="panel-heading">Информация</div>
            <div class="panel-body">
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
    </div>



</div>
</div>

<div>
    <a class="btn btn-primary" href="/user/logout">Выйти</a>
</div>
<script>
    $(document).ready(function() {
        $.ajax({url: "/user/files", success: function(result){
        $("#files").html(result);
    }});
    });
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