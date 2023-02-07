

<?php
// Include the database configuration file
include 'config.php';
$statusMsg = '';

// File upload path
$targetDirImg = "uploads/images/";
$targetDirAudio = "uploads/audios/";

$imgFileName = basename($_FILES["image_file"]["name"]);
$audioFileName = basename($_FILES["audio_file"]["name"]);
$description = $_POST['description'];

$targetFilePathImg = $targetDirImg . $imgFileName;
$targetFilePathAudio = $targetDirAudio . $audioFileName;


$fileTypeImg = pathinfo($targetFilePathImg, PATHINFO_EXTENSION);
$fileTypeAudio = pathinfo($targetFilePathAudio, PATHINFO_EXTENSION);


if (isset($_POST["submit"]) && !empty($_FILES["image_file"]["name"]) && !empty($_FILES["audio_file"]["name"]) && !empty($_POST["description"])) {

    // Allow certain file formats
    $allowTypesImg = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    $allowTypesAudio = array('mp3','mpeg');

    if (in_array($fileTypeImg, $allowTypesImg) && in_array($fileTypeAudio, $allowTypesAudio)) {

        // Upload file to server
        if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFilePathImg) && move_uploaded_file($_FILES["audio_file"]["tmp_name"], $targetFilePathAudio)) {

            // Insert image file name into database
            $insert = $db->query("INSERT into files (image_file,audio_file,description,uploaded_on) VALUES ('" . $imgFileName . "','" . $audioFileName . "','" . $description . "', NOW())");

            if ($insert) {
                $statusMsg = "The files have been uploaded successfully.";
            } else {
                $statusMsg = "Files upload failed, please try again.";
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

// Display status message
echo $statusMsg; ?><br><br>