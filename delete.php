  
  <?php
  include "config.php";
  $id = $_GET["id"];

  $sql_query = "DELETE from files where id = '$id'";
  if ($db->query($sql_query) === TRUE) {
  echo "1 row affected and deleted succesfully";
  } else {
  echo "Error: " . $sql_query . "<br>" . $conn->error;
  }
  $db->close();

  ?>
  <div>
      <a href="admin.php" class="w3-button w3-black btn" style="text-decoration:none;">view Records</a>
  </div>