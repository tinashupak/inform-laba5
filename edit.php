<?php
   require_once 'connection.php'; 
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());
    $query = "SELECT cell_number FROM shop";
    $result = mysqli_query($link, $query);
    
?>
<!DOCTYPE html>
<html>
<body>
<form method='GET' action='rez.php'>
<input type='hidden' name='id' value='<?=@$_GET['id']?>'>
<table border='1'>
<tr>
<th>h</th>
<th>address</th>
<th>cell</th>
</tr>
<tr>
<td><input type='text' name='h' value='<?=@$_GET['h']?>'></td>
<td><input type='text' name='address' value='<?=@$_GET['address']?>'></td>
<td><select name='cell'>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                if ($row['cell_number'] == $_GET['shop'])
                    echo "<option selected value='" . $row['cell_number'] . "'>" . $row['cell_number'] . "</option>";
                else
                    echo "<option value='" . $row['cell_number'] . "'>" . $row['cell_number'] . "</option>";
            }
            ?>
        </select></td>
</tr>
</table>
<p><input type='submit' name='enter' value='submit changes'></p>
</form>
</body>
</html>
