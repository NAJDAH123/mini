<?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$query = $db->query("SELECT * FROM files ORDER BY id");
?>
<html>

<head>
    <title>ADMIN UPDATE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">
    <link href="sharedfile.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>

    <div class="heading">
        <h1>Treasure Collection</h1>
    </div>
    <div class="panel-group" id="accordion">

        <?php
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $imageURL = 'uploads/images/' . $row["image_file"];
                $audioURL = 'uploads/audios/' . $row["audio_file"];
                $description = $row['description'];
                $imageID = $row['id'];
                $name = explode(".", $row["image_file"]);



        ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $imageID ?>" style="text-decoration:none;color:black;">
                            <div style="width:45%;float:left">
                                <h4 class="panel-title">
                                    <?php echo $name[0] ?>
                                </h4>
                            </div>
                        </a>
                        <div style="text-align:right;">
                            <a href="update.php?id=<?php echo $imageID ?>"><span class="material-symbols-outlined" style="margin-right:10px;color:black">
                                    edit
                                </span></a>

                            <a href="delete.php?id=<?php echo $imageID ?>"><span class="material-symbols-outlined" style="margin-right:10px;color:black"> delete </span></a>

                        </div>
                    </div>
                    <div id=" <?php echo $imageID ?>" class="panel-collapse collapse in">
                        <div class="panel-body"> <img src="<?php echo $imageURL; ?>" alt="" width="90%" style="margin-left:5%;" height="400px" />
                            <div class="description" style="text-align:center;font-size:20px;margin:20px;color:rgb(123,123,123);"><?php echo $description ?>
                            </div>
                            <div class="audio" style="text-align:center">
                                <audio controls>
                                    <source src="<?php echo $audioURL; ?>" type="audio/mpeg">

                                </audio>
                            </div>
                        </div>
                    </div>

                </div>



            <?php }
        } else { ?>
    </div>

    <p>No image(s) found...</p>
<?php } ?>

<div class="last">
    <h3>[2023] All rights reserved- (C)QuranicTreasures - Privacy Policy</h3>
</div>
</body>

</html>