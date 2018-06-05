<?php

//cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
	<table class="table table-bordered table-striped">
		<tr>  
            <th width="40%">Product Name</th>  
            <th width="10%">Quantity</th>
            <th width="10%">Doubleshots</th>  
            <th width="20%">Price</th>  
            <th width="15%">Total</th>  
            <th width="5%">Action</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)

	{

		$output .= '
		<tr>
			<td>'.$values["product_name"].'
			<input type="hidden" name="id[]" value="'.$values["product_id"].'">
			<input type="hidden" name="name[]" value="'.$values["product_name"].'">
			</td>
			<td>
			<input type="number" id="'.$values["product_id"].'" class="form-control cart_quantity" name="quantity[]" value="'.$values["product_quantity"].'" min="1">
			</td>
			<td>'.$values["product_shot"].'
			<input type="hidden" name="shot[]" value="'.$values["product_shot"].'">
			</td>
			<td align="right">'.$values["product_price"].' NOK
			<input type="hidden" name="price[]" value="'.$values["product_price"].'">
			</td>
			<td align="right">'.number_format($values["product_quantity"] * $values["product_price"], 2).' NOK
			<input type="hidden" name="total[]" value="'.number_format($values["product_quantity"] * $values["product_price"], 2).'">
			</td>
			<td><button name="delete" type="button" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'" value="'.$values["product_shot"].'">Remove</button></td>
		</tr>
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
	}
	$output .= '
	<tr>  
        <td colspan="3" align="right">Total</td>  
        <td colspan="2" align="center">
        <input id="tot_price" name="tot_price" type="hidden" value="'.number_format($total_price, 2).'">'.number_format($total_price, 2).'NOK
        </td>   
    </tr>
	';
}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Your Cart is Empty!
    	</td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	number_format($total_price, 2).' NOK',
	'total_item'		=>	$total_item
);	

echo json_encode($data);


?>