<?php
$connect = mysqli_connect("localhost", "root", "", "user_db");
if(isset($_POST["id"], $_POST["travels"]))
{
 $id = mysqli_real_escape_string($connect, $_POST["id"]);
 $travels = mysqli_real_escape_string($connect, $_POST["travels"]);
 $query = "INSERT INTO travelstable(id, travels) VALUES('$id', '$travels')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>