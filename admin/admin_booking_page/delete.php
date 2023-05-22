<?php
$connect = mysqli_connect("localhost", "root", "", "user_db");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM book WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>