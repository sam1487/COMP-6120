<?php
include 'database.php';
$con = getConnection();
$tables = array('Book', 'Customer', 'OrderDetail', 'Orders', 'Shipper', 'Subject', 'Supplier');
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
    <form method="GET" action="query.php">
        <textarea name="query" style="font-family: consolas; font-size: large; width: 100%; height: 60px; border: 1px solid gainsboro; padding: 5px"></textarea>
        <br />
        <input type="submit" value="Submit" name="submit" />
    </form>
</div>

</body>
</html>
<?php mysqli_close($con); ?>