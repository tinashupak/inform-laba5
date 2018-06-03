<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Подключились!<br>";

$sql ="SELECT h_number, address, id_shop FROM shop";

if (mysqli_query($link, $sql)) {
  echo "Ок. Принято";
} else {
  echo "Нужно пофиксить" . mysqli_error($link);
}


$result = mysqli_query($link, $sql);

echo "<table border='1'>
<tr> 
<th>h_number</th>
<th>address</th>
<th>id_shop</th>
<th>edition</th>
<th>delete</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $h = $row['h_number'];
    $address = $row['address'];
    $id = $row['id_shop'];
echo "<tr>";
echo "<td>" . $h . "</td>";
echo "<td>" . $address . "</td>";
echo "<td>" . $id . "</td>";
echo "<td><a href='edit.php?h=$h&address=$address&id=$id'>edit</a><br></td>";
echo "<td><a href = './delete.php?id=$id'>delete</a></td>";
echo "</tr>";
}

echo "</table>";

mysqli_close($link);

?>
