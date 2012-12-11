<?php
session_start();
define("USERNAME","Yates");
class Product 
{
   private $productId;
   private $productName;
   private $price;

   public function __construct($productId, $productName, $price) {
       $this->productId = $productId;
       $this->productName = $productName;
       $this->price = $price;
   }  

   public function getId() {
     return $this->productId;
   }

   public function getName() {
     return $this->productName;
   }

   public function getPrice() {
     return $this->price;
   }
  
}

$products = array(
 1 => new product(1, "BBQ Chicken Pizza", 6.99),
 2 => new product(2, "BLT Pizza", 6.99),
 3 => new product(3, "Hawaiian Pizza", 6.99),
 4 => new product(4, "Chicken Parmesan Pizza", 7.49),
 5 => new product(5, "Super Special Pizza", 8.99),
 6 => new product(6, "All Meaty Pizza", 7.99),
 7 => new product(7, "Bread Box", 3.99),
 8 => new product(8, "Bread Box with Bacon", 4.49),
 9 => new product(9, "Bread Box with Pepperoni", 4.49),
 10 => new product(10, "Box Triple Cheese Turbo Stix", 6.99),
 11 => new product(11, "Cinnamon Stix", 3.99),
 12 => new product(12, "Antipasto Salad", 3.99),
 13 => new product(13, "Greek Salad", 3.99),
 14 => new product(14, "Garden Salad", 3.99),
 15 => new product(15, "Party Salad", 4.99),
 16 => new product(16, "Chef Salad", 3.99)
);

if (!isset ($_SESSION["cart"])) $_SESSION["cart"] = array();

if (isset($_GET["action"]) and $_GET["action"] == "addItem")
   {
   addItem();
    } 
elseif (isset($_GET["action"]) and $_GET["action"] == "removeItem")
 { 
  removeItem();
  }
else 
  {
   displayCart();
  }

function addItem() 
{
  global $products;
   

  if (isset($_GET["productId"]) and $_GET["productId"] >= 1 and $_GET["productId"] <= 16) 
   {
   $productId = (int) $_GET["productId"];
   
  if (!isset ($_SESSION["cart"][$productId] )) 
     {
     $_SESSION["cart"][$productId] = $products[$productId];
     }
   } 
    session_write_close();
    header("Location: current_order.php");
}

function removeItem() 
{
  global $products;
   

  if (isset($_GET["productId"]) and $_GET["productId"] >= 1 and $_GET["productId"] <= 16) 
   {
   $productId = (int) $_GET["productId"];
   
  if (isset ($_SESSION["cart"][$productId] )) 
     {
    unset($_SESSION["cart"][$productId]);
     }
   } 
    session_write_close();
    header("Location: current_order.php");
}

function displayCart() {
  global $products;
   $_SESSION["username"] = USERNAME;
   $_POST["username"] == USERNAME;
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
   <title>A Shopping cart using Sessions</title>
  <link rel="stylesheet" type="text/css" href="common.css"/>
  </head>
<body>
 

  
<h1>Your Current Order</h1>

 <dl>
  
  <?php
   $totalPrice = 0; 
   
   foreach ($_SESSION["cart"] as $product){ 
   $totalPrice+=$product->getPrice();?>
  <table>
  <tr>
 
  
  <td><b><dt><?php echo $product->getName() ?></dt></b></td>
  <td><dd>$<?php echo number_format($product->getPrice(),2)?></td>
  <td><a href="current_order.php?action=removeItem&amp;productId=<?php echo $product->getId() ?>">Remove Item</a></dd></td>
  </tr>
 </table>
 <?php } ?>
   <dt>Cart Total:
   <dd><strong>$<?php echo number_format($totalPrice,2) ?></strong></dd> </dt>
  </dl>
 

<?php } ?>

</body>
</html>