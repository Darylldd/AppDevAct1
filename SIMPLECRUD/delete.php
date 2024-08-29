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

// Check if ID parameter is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch products data
    $sql = "SELECT name, description, price, quantity, barcode, created_at, updated_at FROM tbl_products WHERE id=$id";
    $result = $conn->query($sql);
 
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $barcode = $_POST['barcode'];

        // Delete product
        $sql_delete = "DELETE FROM tbl_products WHERE id=$id";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Product has been deleted successfully.";
            header("Location: index.php"); // Redirect back to the index page
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "User not found";
    }
}

$conn->close();
?>
