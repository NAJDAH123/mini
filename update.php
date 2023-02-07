<?php
include 'config.php';

$id = $_GET["id"];
$query = $db->query("SELECT * FROM files where id = $id");

if ($query) {

    $row = $query->fetch_assoc();
    $description = $row["description"];
?>

    <form action="db-save.php" method="post" enctype="multipart/form-data">
        Picture Name: <input type="file" name="image_file"><br><br>
        Audio Name: <input type="file" name="audio_file"><br><br>
        Description: <input type="text" name="description" value="<?php echo $description ?>"><br><br>
        <input type="hidden" name="id" value="<?php echo $id ?>"><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>

<?php
} else {
    echo "Some error occured in retrieving info..";
}
$db->close();

?>

</body>

</html>