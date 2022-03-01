<?php
session_start();
include_once("../includes/config.php");
include("../includes/header1.php");
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<!DOCTYPE html>
<html>
<head>
<link href="../includes/styles2.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>

</head>
<body>
<h1 align="center">Products</h1>
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Your Shopping Cart</h3>';
    echo '<form method="post" action="cart_update.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';
    $total =0;
    $b = 0;
    foreach ($_SESSION["cart_products"] as $cart_itm) {
        
        $pname = $cart_itm["pname"];
        $product_code = $cart_itm["pet_id"];


        //$service_name = $cart_itm["service_name"];
        //$product_price = $cart_itm["service_cost"];
        //$product_code = $cart_itm["service_id"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        echo '<td>'.$pname.'</td>';
        //echo '<td>'.$service_name.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
        echo '</tr>';
        //$subtotal = ($product_price);
        //$total = ($total + $subtotal);
    }
    echo '<td colspan="4">';
    echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';
}
?>
</div> 
<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//$sql = "SELECT * FROM Grooming_service ORDER BY service_id ASC";
$sql = "SELECT pet_id, pname, age, gender,img_pet,petb_id,customer_id FROM Pets ORDER BY pet_id ASC";

$results = mysqli_query($conn,$sql);
if($results){ 
    $products_item = '<ul class="products">';
//fetch results set as object and output HTML
     while ($row = mysqli_fetch_array($results)) {

        $products_item .= <<<EOT
        <li class="product">
            <form method="post" action="cart_update.php">
                <div class="product-content"><h3>{$row['pname']}</h3>
                <div class="product-thumb"><img src="{$row['img_pet']}" width=150px height=150px></div>

                <input type="hidden" name="pet_id" value="{$row['pet_id']}" />
                <input type="hidden" name="type" value="add" />
                <input type="hidden" name="return_url" value="{$current_url}" />
                <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
                </div></div>
             </form>
        </li>
EOT;
}

$products_item .= '</ul>';

echo $products_item;
}
?>
</body>
</html>
<?php } ?>