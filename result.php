<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    $UserID = $_SESSION["uid"];
    $fname = $_SESSION["fname"];
}else{
    $UserID = 0;
}


if((isset($_GET['submit']))){
    $search = $_GET['search'];

    $productsql = "SELECT * FROM Product WHERE ProductName LIKE '%$search%' OR Category LIKE '%$search%' OR SubCategory LIKE '%$search%' OR ProductDesc LIKE '%$search%' ORDER BY ProductID DESC";
    $presult = $conn->query($productsql);

    
    if ($presult->num_rows> 0)
    {
        while($row = $presult->fetch_assoc())
        {
            $items[]=$row;
            
        }
    }
    else
    {
    echo "Product Not Found";
    
    } 

$title = "search results";
include 'header.php';
?>

<div class="items">
  <div class="product-items">
              <?php foreach ($items as $items): ?>
                <div class="product-item">
              
              
                  <img src="<?php echo $items['filepath']; ?>" alt="<?php echo $items['filename']; ?>">
                  <h4><?php echo $items['ProductName']; ?></h4>
                  <h3>Rs.<?php echo $items['Price']; ?>.00</h3>
                  <a href = "product.php?id=<?php echo $items['ProductID'];?>"><button>View Item</button></a>
                </div>
               <?php endforeach; ?>
	
	
  
  </div>
  </div>


<?php
}
else
    {
    echo "Product Not Found";
    
    
    } 

$conn->close();
include 'footer.php';

?>