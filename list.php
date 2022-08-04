<?php
$articles = fopen("articles.txt", "r");
if ($articles !== false) {
    do  {
        // process the line read.
        $line = fgetcsv($articles, null, ";");
    } while ($line !== false);
    fclose($articles);
} else {
    // error opening the file.
}
?>
<table>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Date</th>
    </tr>
    <?php
    $fp = 'articles.txt';
    $file = array_reverse(file($fp));
    foreach ($file as $value){
        $result = explode(";", $value);
        $num = $result[0];
        $name = $result[1];
        $date = $result[2];
        ?>
        <tr>
            <td><?php echo $num ?></td>
            <td><?php echo $name ?></td>
            <td><?php echo $date ?></td>
        </tr>
    <?php } ?></table>
