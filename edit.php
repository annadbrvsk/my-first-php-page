<?php
require('library.php');
if (isset($_POST["id"])) {
    putArticle($_POST);
    setcookie("articleSaved", "saved", time() + 10);
    header('Location: http://localhost:8080/edit.php?id=' . $_POST["id"]);
}
if (isset($_COOKIE["articleSaved"])) {
    setcookie("articleSaved", "saved", time() - 10);
    ?>
    <div style="width: 100px; margin-top: 5px; padding: 15px 15px; background: #94E8B4; border-radius: 8px; font-size: 16px;">Saved</div>
    <?php
}
if (isset($_GET["id"])) {
    $article = findArticleById($_GET["id"]);
}
?>
<form method="post">
    <label>Id:</label><br>
    <input value="<?php echo $article->getId() ?>" name="id" readonly><br>
    <label>Title:</label><br>
    <input value="<?php echo $article->getTitle() ?>" name="title"><br>
    <label>Body:</label><br>
    <textarea rows="4" cols="50" name="body"><?php echo $article->getBody() ?></textarea><br>
    <label>Date:</label><br>
    <input value="<?php echo $article->getDate() ?>" name="date"><br>
    <input type="submit">
</form>