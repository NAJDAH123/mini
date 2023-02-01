<?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY id DESC");
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">
    <link href="sharedfile.css" rel="stylesheet">
    <link href="file2.css" rel="stylesheet">
</head>

<body>
    <!-- <script>
        $('#collapseOne').collapse({
            toggle: false
        })
        $('#collapseOne').on('hidden.bs.collapse', function() {
            // do something…
            $('.collapse').collapse()
        })
    </script> -->
    <div class="heading">
        <h1>Treasure Collection</h1>
    </div>
    <div class="panel-group" id="accordion">
        
        
        <?php
        
        $names = array("surah fatihah","surah 2","surah 3","surah 4","surah 5");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $imageURL = 'uploads/' . $row["file_name"];
                $imageID = $row['id'];
                echo $row["id"];
               
        ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $imageID ?>"><?php echo $names[($imageID -1)] ?></a>
                        </h4>
                    </div>
                    <div id="<?php echo $imageID ?>" class="panel-collapse collapse in">
                        <div class="panel-body"> <img src="<?php echo $imageURL; ?>" alt="" width="300px" height="400px" />
                        <div class="description"></div>
                        <div class="audio"></div>
                        </div>
                    </div>
                    
                </div>



            <?php }
        } else { ?>
    </div>

    <p>No image(s) found...</p>
</body>

</html>
<?php } ?>