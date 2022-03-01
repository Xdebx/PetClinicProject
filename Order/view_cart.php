<?php
session_start();
include("../includes/header1.php");
include_once("../includes/config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="../includes/styles2.css" rel="stylesheet" type="text/css"></head>
<body>
<h1 align="center">View Cart</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
  <?php
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if(isset($_SESSION["cart_products"])) //check session var
    {
      $total = 0; //set initial total value
      $b = 0; //var for zebra stripe table 
foreach ($_SESSION["cart_products"] as $cart_itm)
        {
//set variables to use in content below
         $pname = $cart_itm["pname"];
        $pet_id = $cart_itm["pet_id"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
    echo '<tr class="'.$bg_color.'">';
  echo '<td>'.$pname.'</td>';
  
  echo '<td><input type="checkbox" name="remove_code[]" value="'.$pet_id.'" /></td>';
  echo '</tr>';
//$total = ($total + $product_price); //add subtotal to total var
        }
}
?>
    <tr><td colspan="5"><span style="float:right;text-align: right;">Amount Payable : <?php echo sprintf("%01.2f", $total);?></span></td></tr>
    <tr><td colspan="5"><a href="orders.php" class="button">Add More Items</a>
    <button type="submit">Update</button></td>
<td colspan="5"><a href="checkout.php" class="button">checkout</a></td>
</tr>
</tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
</body>
</html>