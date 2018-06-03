<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());
    

    $h = $_GET['h'];
	$address = $_GET[address'];
    $id = (int)$_GET['id'];
    $cell= $_GET['cell_number'];

    $update1="UPDATE shop
    SET h_number='$h', address='$address'
    WHERE id_shop = $id";
    $result1= mysqli_query($link, $update1);
    $update2="UPDATE cell
    SET cell_number='$cell'
    WHERE id_shop = $id";
    $result2= mysqli_query($link, $update2);

?>

<html>
<body>
<script type='text/javascript'>
    window.location = 'list.php'
</script>
</body>
</html>
