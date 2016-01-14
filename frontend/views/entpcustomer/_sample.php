<?php
/**
 * Created by PhpStorm.
 * User: Azrul APTinventions
 * Date: 12/01/2016
 * Time: 08:41
 */
echo "Product : " .$customer->name."<br>";
echo "Code : " . $customer->address."<br>";
echo "Price : " . " RM " . $customer->telephone;
echo "<input type='text' value='".$customer->name."' name='refername' id='refername'>";
echo "<input type='text' value='".$customer->address."' name='referaddress' id='referaddress'>";
echo "<input type='text' value='".$customer->telephone."' name='refertelephone' id='refertelephone'>";
echo "<input type='text' value='".$customer->fax."' name='referfax' id='referfax'>";
echo "<input type='text' value='".$customer->pic."' name='referpic' id='referpic'>";
echo "<input type='text' value='".$customer->mobile."' name='refermobile' id='refermobile'>";