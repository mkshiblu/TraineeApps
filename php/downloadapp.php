<?php


require_once('dbconnectvars.php');
require_once('appvariables.php');
require_once('SQLS.php');

if(isset($_POST['app_id'])){
$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
//echo $_POST['file'];
mysqli_query($dbc, DOWNLOAD_INC);
mysqli_close($dbc);
header('location: ../'. $_POST['file']);
}
?>
