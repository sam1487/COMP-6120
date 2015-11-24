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
    //$books = mysqli_fetch_assoc($result);
    $numFields = mysqli_num_fields($result);

    echo '<tr>';
    for($i = 0; $i < $numFields; $i++) {
        $field = mysqli_fetch_field_direct($result, $i);
        echo '<th>' . $field->name . '</th>';
    }
    echo '</tr>';


    ?>
    </thead>
    
    <?php
    $books = array();
    while($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
    foreach($books as $row) {
        echo '<tr>';
        foreach($row as $col) {
            echo '<td>' . $col . '</td>';        
        }
        echo '</tr>';
    }
    
    mysqli_free_result($result);

    ?>

</table>

<br><br>


</body>
</html>
<?php mysqli_close($con); ?>