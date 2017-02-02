<?php
$hemel=mysqli_connect('localhost','root','','appstore');

//$query="SELECT * FROM apps";
$query="SELECT apps . * , users.username
FROM apps
INNER JOIN users ON apps.userid = users.userid";

$data=mysqli_query($hemel, $query);

while($row=mysqli_fetch_array($data)){
echo '<img class="appimage"src="images/appimages/'.$row['image'].'">';
echo $row['appname'].'  ';
echo $row['appid'].'  ';
echo $row['image'].'  ';
echo $row['rating'].'  '; 
echo $row['uploaddate'].'  ';
echo '<h3 class="btn btn-info">'.$row['username'].'</h3>';


echo "<br>";
}
?>