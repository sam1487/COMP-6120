<?php
include 'database.php';
$con = getConnection();
if(!$con) {
    reportError(mysqli_error($con));
    die();    
}
$tables = array('Book', 'Customer', 'OrderDetail', 'Orders', 'Shipper', 'Subject', 'Supplier');

function reportError($msg) {
    echo '<div style="width: 100%; background: #f2dede; padding: 10px; border-radius: 5px">' . $msg . '</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>COMP-6120: Term Project</title>
    <link rel='stylesheet' href='style.css' type='text/css' media='all' />
</head>

<body>
    <div style="text-align: center; height: 50px;; border-bottom: 1px solid grey">
        <a href='index.php' style = "border-radius: 5px; background: lightblue; width: 100px; height: 25px; padding: 10px;">All Tables</a>
        <a href='' style = "border-radius: 5px; background: lightblue; width: 100px; height: 25px; padding: 10px;">Query Database</a>
    </div>



<h1>Query Database</h1>
<div style="margin: 5px">  
    <form method="POST" action="query.php">
        <textarea name="query" style="font-family: consolas; font-size: larger; width: 100%; height: 100px; border: 1px solid gainsboro; padding: 5px"><?= $_POST['query']?></textarea>
        <br />
        <input type="submit"/>
    </form>
</div>

<div style="padding: 5px">

<?php
if(isset($_POST['query'])) {
    $query = $_POST['query'];
    $result = executeQuery($con, $query);  
    if($result == false) {
        reportError(mysqli_error($con));
        die();
    }
    ?>
    <table class="bordered">
        <thead>
        <?php
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
        $rows = array();
        while($resultRow = mysqli_fetch_assoc($result)) {
            $rows[] = $resultRow;
        }
        foreach($rows as $row) {
            echo '<tr>';
            foreach($row as $col) {
                echo '<td>' . $col . '</td>';        
            }
            echo '</tr>';
        }
        
        mysqli_free_result($result);

        ?>

    </table>
<?php
}
?>
</div>

</body>
</html>
<?php mysqli_close($con); ?>