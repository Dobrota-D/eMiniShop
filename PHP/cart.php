<?php


if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "id_article");
		if(!in_array($_GET["id"], $item_array_id))
		{
		$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
		'id_article'		=>	$_GET["id"],
        'name_article'		=>	$_POST["hidden_name"],
        'description_article'  => $_POST["hidden_description"],
		'price_article'		=>	$_POST["hidden_price"],
		'quantity_article'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
		echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
		'id_article'		=>	$_GET["id"],
        'name_article'		=>	$_POST["hidden_name"],
        'description_article'  =>  $_POST["hidden_description"],
		'price_article'		=>	$_POST["hidden_price"],
		'quantity_article'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
 
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		if($values["id_article"] == $_GET["id"])
		{
		unset($_SESSION["shopping_cart"][$keys]);
		echo '<script>alert("Item Removed")</script>';
		echo '<script>window.location="index.php"</script>';
		}
		}
	}
}


?>