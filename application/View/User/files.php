<table class="table">
    <?php foreach($this->viewBag  as $file): ?>
    <tr>
        <td><a href="<?= $file['url'] ?>"><?= $file['name'] ?></a></td>
        <td>
            
            <a href="/user/delete/<?= $file['fileId'] ?>"><span class="glyphicon glyphicon-remove-sign" >Удалить</span></a>
            
        </td>
    </tr>
    <?php endforeach; ?>
</table>
