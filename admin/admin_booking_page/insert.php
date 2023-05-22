<?php
$connect = mysqli_connect("localhost", "root", "", "user_db");
if(isset($_POST["id"], $_POST["user"]))
{
 $id = mysqli_real_escape_string($connect, $_POST["id"]);
 $user = mysqli_real_escape_string($connect, $_POST["user"]);
 $dest = mysqli_real_escape_string($connect, $_POST["destination"]);
 $num = mysqli_real_escape_string($connect, $_POST["num"]);
 $arrival = mysqli_real_escape_string($connect, $_POST["arrival"]);
 $leaving = mysqli_real_escape_string($connect, $_POST["leaving"]);

 $query = "INSERT INTO book(id, user,destination,num,arrival,leaving) VALUES('$id', '$user','$dest','$num','$arrival','$leaving')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>