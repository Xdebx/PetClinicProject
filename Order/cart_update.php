<?php
session_start();
include_once("../includes/config.php");
//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add'> 0)
{
    foreach($_POST as $key => $value){ //add all post vars to new_product array
        $new_product[$key] = $value;
    }
// var_dump($new_product);
// exit();
//remove unecessary vars
unset($new_product['type']);
unset($new_product['return_url']);
// var_dump($new_product);
// exit(); 
  //we need to get product name and price from database.
    //$sql = "SELECT * FROM Grooming_Service where service_id = ". $new_product['service_id'];
    $sql = "SELECT * FROM Pets where pet_id = ". $new_product['pet_id'];
    $result = mysqli_query( $conn, $sql);
 //echo $result;
 $num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<table border=1>\n";
  while ($row = mysqli_fetch_array($result)) {  
//fetch product name, price from db and add to new_product array
     $new_product["pname"] = $row['pname']; 
        //$new_product["service_name"] = $row['service_name']; 
        //$new_product["service_cost"] = $row['service_cost']; 
      
//         var_dump($new_product);
// exit();
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            //if(isset($_SESSION["cart_products"][$new_product['service_id']])) //check item exist in products array
             if(isset($_SESSION["cart_products"][$new_product['pet_id']])) //check item 
            {
                unset($_SESSION["cart_products"][$new_product['pet_id']]);
                //unset($_SESSION["cart_products"][$new_product['service_id']]); //unset old array item
                //  var_dump($_SESSION["cart_products"]);
                // exit();
            }           
        }
        $_SESSION["cart_products"][$new_product['pet_id']] = $new_product;
        //$_SESSION["cart_products"][$new_product['service_id']] = $new_product; //update or create product session with new item  
        var_dump($_SESSION["cart_products"]);
        exit();
    } 
}
//remove an item from product session
if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
foreach($_POST["remove_code"] as $key){
unset($_SESSION["cart_products"][$key]);
}
}
echo "<pre>";
     print_r($_SESSION);
     //print_r($new_product);
     echo "</pre>";
//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
//header('Location:'.$return_url);
?>