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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    // Update product
    $sql = "UPDATE tbl_products SET name='$name', description='$description', price='$price', quantity='$quantity', barcode='$barcode' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect back to the index page
        exit(); // Terminate script execution after redirect
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Check if ID parameter is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product data
    $sql = "SELECT * FROM tbl_products WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $barcode = $row['barcode'];

    
        echo "<h2>Edit Product</h2>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' id='name' name='name' value='$name' required><br>";
        echo "<label for='description'>Description:</label>";
        echo "<input type='text' id='description' name='description' value='$description' required><br>";
        echo "<label for='price'>Price:</label>";
        echo "<input type='text' id='price' name='price' value='$price' required><br>";
        echo "<label for='quantity'>Quantity:</label>";
        echo "<input type='text' id='quantity' name='quantity' value='$quantity' required><br>";
        echo "<label for='barcode'>Barcode:</label>";
        echo "<input type='text' id='barcode' name='barcode' value='$barcode' required><br>";
        echo "<input type='submit' value='Update Product'>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "Product not found";
    }
}

$conn->close();
?>
