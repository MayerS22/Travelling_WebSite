<?php
$connect = mysqli_connect("localhost", "root", "", "user_db");
if(isset($_POST["id"], $_POST["trips"]))
{
 $id = mysqli_real_escape_string($connect, $_POST["id"]);
 $trips = mysqli_real_escape_string($connect, $_POST["trips"]);
 $query = "INSERT INTO tripstable(id, trips) VALUES('$id', '$trips')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>