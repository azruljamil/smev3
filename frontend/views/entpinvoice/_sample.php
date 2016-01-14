<?php
/**
 * Created by PhpStorm.
 * User: Azrul APTinventions
 * Date: 11/01/2016
 * Time: 20:49
 */

echo "Product : " .$product->product."<br>";
echo "Code : " . $product->code."<br>";
echo "Price : " . " RM " . $product->price;
echo "<input type='hidden' value='".$product->product."' name='referproduct' id='referproduct'>";
echo "<input type='hidden' value='".$product->code."' name='refercode' id='refercode'>";
echo "<input type='hidden' value='".$product->price."' name='referprice' id='referprice'>";

?>