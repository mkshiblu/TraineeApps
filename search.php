<?php

//echo "tahin";
$search= $_GET['tahsin'];


$dbc=mysqli_connect('localhost','root','','appstore');
$query="SELECT * FROM apps WHERE appname like '%$search%'";
$data=mysqli_query($dbc,$query);


while($row=mysqli_fetch_array($data)){
echo $row['appid'];
echo $row['appname'];
echo '<br>';
}

?>