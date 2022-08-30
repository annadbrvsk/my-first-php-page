<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Date</th>
    </tr>
    <?php
    require('library.php');
    $articles = getArticles();
    foreach ($articles as $article){
    ?>
    <tr>
        <td><?php echo $article->getId() ?></td>
        <td>
        <a href="http://localhost:8080/edit.php?id=<?php echo $article->getId() ?>">
            <?php echo $article->getTitle() ?>
            </a>
        </td>
        <td><?php echo $article->getDate() ?></td>
    </tr>
    <?php } ?>
</table>