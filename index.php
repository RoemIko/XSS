<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset=”UTF-8″>
<title>PAD9 Forum</title>
</head>
<body>
<h3>ITSOURCECODE Simple Forum in PHP/MYSQL</h3>
<a href=”add-board.php”>Add New Topic Board</a><br>
<?php
$sql = "SELECT cat_name, cat_description FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["cat_name"]. " Description " . $row["cat_description"]. "<br>";
    }
} else {
    echo "0 results";
}
?>
</body>
</html>
