<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppDevActivity1</title>
</head>
<body>
    <div class="container">
        <div>
            <h2>Add Product</h2>
            <form action="create.php" method="post">
                Name: <input type="text" name="name" required><br>
                Description: <input type="text" name="description" required><br>
                Price: <input type="text" name="price" required><br>
                Quantity: <input type="text" name="quantity" required><br>
                Barcode: <input type="text" name="barcode" required><br>
                <input type="submit" value="Add Product">
            </form>

            <h2>Products</h2>
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Barcode</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                <?php include 'read.php'; ?>
            </table>
        </div>
    </div>
</body>
</html>
