<?php
include 'database.php';
$con = getConnection();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Practical CSS3 tables with rounded corners - demo</title>
    <link rel='stylesheet' href='style.css' type='text/css' media='all' />
</head>

<body>

<h2>Book</h2>
<table class="bordered">
    <thead>
    <?php
    $query = 'SELECT * FROM Book';
    $result = executeQuery($con, $query);  
    if(!$result) {
        die('Query failed to execute: ' . mysqli_error($con));   
    }
    $books = mysqli_fetch_assoc($result);
    $numFields = mysql_numfields($books);

    echo '<tr>';
    for($i = 0; $i < $numFields; $i++) {
        $fieldName = mysql_field_name($books, $i);
        echo '<th>' . $fieldName . '</th>\n';
    }
    echo '</tr>';


    ?>
    </thead>
    

</table>

<br><br>


</body>
</html>
