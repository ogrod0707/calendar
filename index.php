
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>d</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
<form action="" method="POST">
    Enter date (numeric month, from 1-12): <br>
    <input type="number" name="year" value="year" placeholder="year"><br>
    <input type="number" name="month" value="month" placeholder="month" ><br>
    <input type="submit" name="submit" value="submit"><br>
</form>




<?php
include"cal_algo.php";

$calendar = new Calendar($_POST['year'], $_POST['month']);


?>

</main>







</body>
</html>