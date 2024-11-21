<table>
    <tr>
        <?php foreach ($headers as $header): ?>
            <th><?= $header ?></th>
        <?php endforeach ?>  
        <th>Ações</th>      
    </tr>
    <?php foreach ($data as $itens): ?>
    <tr>
        <?php foreach ($itens as $key => $item): ?>
            <td><?= $item?></td>
        <?php endforeach?>
        <td>
            <button hx-delete="/api/<?=$table?>.php?id=<?= $itens["id"]?>" hx-swap="outerHTML" hx-target="table">Deletar</button>
            <a href="alterar.php?id=<?= $itens["id"]?>">Alterar</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>