<html>

<body>
    <?php
    include 'config.php';

    $id = $_POST["id"];
 

    // File upload path
    $targetDirImg = "uploads/images/";
    $targetDirAudio = "uploads/audios/";

    echo $_FILES["image_name"]["name"];
    echo $_FILES["audio_name"]["name"];
    echo $_POST["description"];

    $imgFileName = basename($_FILES["image_name"]["name"]);
    $audioFileName = basename($_FILES["audio_name"]["name"]);
    $description = $_POST['description'];

    $targetFilePathImg = $targetDirImg . $imgFileName;
    $targetFilePathAudio = $targetDirAudio . $audioFileName;


    $fileTypeImg = pathinfo($targetFilePathImg, PATHINFO_EXTENSION);
    $fileTypeAudio = pathinfo($targetFilePathAudio, PATHINFO_EXTENSION);


    if (isset($_POST["submit"]) && !empty($_FILES["image_name"]["name"]) && !empty($_FILES["audio_name"]["name"]) && !empty($_POST["description"])) {

        // Allow certain file formats
        $allowTypesImg = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        $allowTypesAudio = array('mp3', 'mpeg');

        if (in_array($fileTypeImg, $allowTypesImg) && in_array($fileTypeAudio, $allowTypesAudio)) {

            // Upload file to server
            if (move_uploaded_file($_FILES["image_name"]["tmp_name"], $targetFilePathImg) && move_uploaded_file($_FILES["audio_name"]["tmp_name"], $targetFilePathAudio)) {

                // Insert image file name into database
                $insert = $db->query("UPDATE files set image_name ='$imgFileName' ,  audio_name = '$audioFileName ', description = '$description', uploaded_on = 'NOW()' where id = $id");

                if ($insert) {
                    $statusMsg = "The files have been updated successfully.";
                } else {
                    $statusMsg = "Files update failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }

    echo $statusMsg;

    ?>
    <div>
        <a href="admin.php">View Records</a>
    </div>

</body>

</html>