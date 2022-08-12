<?php
require('library.php');
if (isset($_POST['SubmitButton']) && isset($_POST["id"])) {
    putArticle($_POST);?>
    <div style="margin-top: 5px; padding: 15px 15px; background: #94E8B4; border-radius: 8px; font-size: 16px;"><?php echo "Saved" ?></div>
<?php }
if (isset($_GET["id"])) {
    $article = findArticleById($_GET["id"]);
}
?>
<form method="post">
    <label>Id:</label><br>
    <input value="<?php echo $article[0] ?>" name="id" readonly><br>
    <label>Title:</label><br>
    <input value="<?php echo $article[1] ?>" name="title"><br>
    <label>Body:</label><br>
    <textarea rows="4" cols="50" name="body"><?php echo $article[2] ?></textarea><br>
    <label>Date:</label><br>
    <input value="<?php echo $article[3] ?>" name="date"><br>
    <input type="submit" name="SubmitButton">
</form>