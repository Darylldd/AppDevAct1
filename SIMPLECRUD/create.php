<?php
// Database connection
$servername = "localhost";
$username = "darill";
$password = "darill";
$dbname = "simcrud";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert new product
//$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$barcode = $_POST['barcode'];

$sql = "INSERT INTO tbl_products ( name, description, price,quantity,barcode) VALUES ( '$name', '$description', '$price', '$quantity', '$barcode')";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // Redirect back to the index page
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
