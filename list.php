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
        <td><?php echo $article[0] ?></td>
        <td><?php echo $article[1] ?></td>
        <td><?php echo $article[3] ?></td>
    </tr>
    <?php } ?>
</table>
