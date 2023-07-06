<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];



$title = "Add New Product";
include 'header.php';
?>

    <div class="user-content">
        <center>
        <h2>Add New Product</h2>
        </center>

    <form action="publish.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Add New Product</legend>
            <label for="productname">Product Name:</label>
            <input type = "text" name = "productname" id = "productname" required><br>
            <label for="productdesc">Product Description:</label>
            <textarea name="productdesc" id="productdesc"></textarea><br>
            <label for="image">Select Product Image:</label>
            <input type="file" name="image" id="image" required><br><br><br>
            <label for="Category">Choose Category:-</label><br>
            <label for="Main Category">Main Categories:</label>
            <select name="maincategory" id="maincategory" onchange="updateSubcategory()" required>
                <option value="men">Men</option>
                <option value="women">Women</option>
                <option value="kids">Kids</option>
            </select>

            <label for="Sub Category">Sub Category:</label>
            <select name="subcategory" id="subcategory" required>
                <option value="tshirt">T-Shirt</option>
                <option value="trouser">Trouser</option>
                <option value="shirt" data-category="men">Shirt</option>
                <option value="frock" data-category="women">Frock</option>
                <option value="watches" data-category="men">Watches</option>
                <option value="boys" data-category="kids">Boys</option>
                <option value="girls" data-category="kids">Girls</option>
                <option value="accessories">Accessories</option>
                <option value="watches">Watches</option>
                <option value="footwear">Footwear</option>
                <option value="blouse" data-category="women">Blouse</option>
                <option value="short">Shorts</option>
               
                
            </select><br><br>
            <label for = "Size">Size:</label>
         
            XS:<input type="radio" id="rate" name="size" value = "XS">&nbsp;
            S:<input type="radio" id="rate" name="size" value = "S">&nbsp;
            M:<input type="radio" id="rate" name="size" value = "M">&nbsp;
            L:<input type="radio" id="rate" name="size" value = "L">&nbsp;
            XL:<input type="radio" id="rate" name="size" value = "XL">&nbsp;
            No Size:<input type="radio" id="rate" name="size" value = "NA" checked><br><br>
            <label for = "Brand">Brand:</label>
            <input type = "text" name = "brand" id = "brand"><br><br>
            <label for = "price">Price:</label>
            Rs:<input type = "number" name = "price" id = "price" required>.00<br>
            <input type="checkbox" id="agree" name="agree" value="agree" required>Confirm Product Details<br>
            <input type="submit" name="publish" value="Publish">
        </fieldset>
    </form>



        

    </div>


<?php 

$conn->close();
include 'footer.php';

?>